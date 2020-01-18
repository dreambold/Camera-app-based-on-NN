#! /usr/bin/python3
# coding=utf-8
import time, sys, json
import RPi.GPIO as GPIO
from datetime import datetime
from settings import *
from remote_setup import *
from filetransfers import *
from takepic import *
from logger import *
from addon_function import *
import importlib

#setup the switch
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(ssrPin,GPIO.OUT)
GPIO.output(ssrPin, False)
GPIO.setup(switchPin,GPIO.IN)

try:
	#parse the arguments
	#print ('Number of arguments:', len(sys.argv), 'arguments.')
	#print ('Argument List:', str(sys.argv[1]))
	if len(sys.argv) >1:
		if sys.argv[1] =="test":
			print ('Running in Test Mode')
			WriteLog('Running in Test Mode\n')
			testMode=True
	nowdate=datetime.now()
	now=time.time()
	print(str(nowdate)+' ready for the first shot')
	WriteLog(str(nowdate)+' ready for the first shot\n')
	while runLoop==True:
		picSetDelay=int(setupValues['capture_interval'])
		pollSetDelay=int(setupValues['poll_interval'])
		now=time.time()
		nowdate=datetime.now()
		value = GPIO.input(switchPin)
		if debug>=2: print("debug: digital input read: ",value)
		if now-lastPollTime>=pollSetDelay:
			setupValues=PollSetup()
			if int(setupValues['get_update'])>0:
				DownloadAddon()
			importlib.reload(sys.modules['addon_function'])
			from addon_function import *
			AddonFunction()
			lastPollTime=now
			if debug>=1:  print("debug: polled setup from server: "+str(setupValues))
		if (value==1 and now-lastPicTime>=picMinDelay) or testMode==True or now-lastPicTime>=picSetDelay:
			if int(setupValues['light_on'])>0:
				GPIO.output(ssrPin, True)
			lastPicTime=now
			picId= "Client_"+str(ClientID).zfill(10)+"_Cam_"+str(CamID).zfill(10)+"_Pic_"+str(nowdate.year)+"_"+str(nowdate.month).zfill(2)+"_"+str(nowdate.day).zfill(2)+"__"+str(nowdate.hour).zfill(2)+"_"+str(nowdate.minute).zfill(2)+"_"+str(nowdate.second).zfill(2)
			#print("take picId: ",picId)
			newfilename=picSavePath+picId+'.png'
			TakePic(newfilename)
			GPIO.output(ssrPin, False)
			UploadPic(newfilename)
			print(str(nowdate)+' ready for the next shot')
			WriteLog(str(nowdate)+' ready for the next shot\n')
		elif value==0: 
			time.sleep(0.1) #needed! Raspberry pi doesn't like if you have a racing loop reading an input. maybe slightly less timeout would do it though...
		if testMode==True:
			runLoop=False
	WriteLog(str(nowdate)+' loop ended for some reason...\n')
		
except KeyboardInterrupt:
	DeleteImages()
	cam.close()
	sys.exit()