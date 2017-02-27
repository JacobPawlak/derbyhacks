#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017
#toggleLock.py


import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setup(12, GPIO.OUT)
p = GPIO.PWM(12, 50)
p.start(7.5)
p.ChangeDutyCycle(6)
time.sleep(.2)
GPIO.cleanup()
