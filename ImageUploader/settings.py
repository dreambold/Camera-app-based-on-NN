UploadURL = 'https://inventocam.com/ui/uploads/upload.php' 
DownloadURL = 'https://inventocam.com/ui/uploads/updates/addon_function.py' 
picSavePath='/dev/shm/' #for one pic we can put it into RAM, faster and less wear on SD card
debug=0
AddonFileName='/home/pi/Inventocam/ImageUploader/addon_function.py'
RemoteSetupFileName='/home/pi/Inventocam/ImageUploader/remote_setup.py'
CaptureResolution=(2592, 1944)
CaptureRotation=0
switchPin=24 #where we read the switch status
ssrPin=23 #ssr is connected to a lightbulb (LED of course)
DeviceKey='b6c7e2bd48e80ca4cd7d53dd29a26e46'
connectionWaitTime=10

CamID=1 #between 1 and 1000000000 
ClientID=1 #between 1 and 1000000000
#combination of cam and client must be unique!!!
picMinDelay=0.1
lastPicTime=0
lastPollTime=0
testMode=0
runLoop=True

