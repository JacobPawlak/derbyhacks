#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017
#motion.py

from gpiozero import MotionSensor

pir = MotionSensor(4)
num = 0;
while(True):

	pir.wait_for_motion()
	while (pir.motion_detected):
		print("Motion detected!"+str(num))
		num = num+1
	pir.wait_for_no_motion()
	print("no motion" + str(num))
