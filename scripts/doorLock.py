#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017
#doorLock.py


import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)

GPIO.setup(33, GPIO.OUT)

p = GPIO.PWM(33, 50)

p.start(7.5)
p.ChangeDutyCycle(6)
time.sleep(.75)
GPIO.cleanup()
