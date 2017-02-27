#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017
#elevatorDown.py

import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)

GPIO.setup(33, GPIO.OUT)

p = GPIO.PWM(33, 50)

p.start(7.5)
p.ChangeDutyCycle(6)
time.sleep(1.25*1.74)
GPIO.cleanup()
"""
try:
        while True:
                p.ChangeDutyCycle(9)
                time.sleep(1.25)
                p.ChangeDutyCycle(6)
                time.sleep(1.7)

except KeyboardInterrupt:
        GPIO.cleanup()
"""
