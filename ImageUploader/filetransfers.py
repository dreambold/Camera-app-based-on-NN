import requests, json, os, time
from requests.auth import HTTPBasicAuth
from datetime import datetime
from settings import *
from logger import *
from remote_setup import setupValues as oldSetup


def UpdateSetup(Values):
	f = open(RemoteSetupFileName, "w")
	f.write("setupValues="+str(Values))
	f.close()

def PollSetup():
	if debug>=1: print("debug: polling Setup: ")
	datatosend={'key':DeviceKey}
	try:
		r = requests.post(UploadURL, data = datatosend)
		if debug>=1: print("debug: poll answer from server: ("+UploadURL+") "+r.text)
		polledSetupValues=json.loads(r.text)
		UpdateSetup(polledSetupValues)
		#WriteLog(str(datetime.now())+' polled data from server: '+str(polledSetupValues)+' \n')
		return polledSetupValues
		
	except requests.RequestException:
		WriteLog(str(datetime.now())+' polling error, waiting for '+str(connectionWaitTime)+' s \n')
		time.sleep(connectionWaitTime)
		return oldSetup

def UploadPic(path):
	if debug>=1: print("debug: start upload of: ",path)
	if debug>=1: print("debug: file size: ",os.path.getsize(path))
	files = {'upfile' : open(path, 'rb')}
	datatosend={'key':DeviceKey}
	try:
		r = requests.post(UploadURL, files = files, data = datatosend)
		if debug>=1:  print("debug: answer from server upload: ("+UploadURL+") "+r.text)
		os.remove(path)
	except requests.RequestException:
		WriteLog(str(datetime.now())+' upload error, waiting for '+str(connectionWaitTime)+' s \n')
		time.sleep(connectionWaitTime)
	
def DownloadAddon():
	if debug>=1: print("debug: start addon download ")
	try:
		r = requests.get(DownloadURL, auth=HTTPBasicAuth('alexis', 'Safe4UI'))
		if debug>=1:  print("debug: answer from server download: ("+DownloadURL+") "+r.text)
		f = open(AddonFileName, "w")
		f.write(r.text)
		f.close()
	except requests.RequestException:
		WriteLog(str(datetime.now())+' download error, waiting for '+str(connectionWaitTime)+' s \n')
		time.sleep(connectionWaitTime)
	
def DeleteImages():
	os.system("rm /dev/shm/*.png 2> /dev/null")