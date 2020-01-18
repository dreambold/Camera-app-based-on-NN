LogDir="/home/pi/logs/"
LogFile="ImageUploader.log"

def WriteLog(text):
	logpath=LogDir+LogFile
	f = open(logpath,"a")
	f.write(text)
	f.close()