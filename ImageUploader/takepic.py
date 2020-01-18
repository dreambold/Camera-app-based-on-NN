import picamera
from settings import *

cam = picamera.PiCamera()
cam.resolution = CaptureResolution
cam.rotation = CaptureRotation
def TakePic(path):
	if debug>=1: print("debug: save path: ",path)
	cam.capture(path)
	if debug>=1: print("debug: image captured")
	