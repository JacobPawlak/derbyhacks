#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017 (Febrauary 24th, 2017)
#Raspberry pi controller for LEDs

import RPi.GPIO as GPIO
from time import *
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
def main():

	GPIO.setup(18, GPIO.OUT)
	GPIO.setup(17, GPIO.OUT)
	GPIO.setup(27, GPIO.OUT)
	print "LED 1 ON"
	print "LED 2 ON"
	print "LED 3 ON"
	GPIO.output(17, not GPIO.input(17))
	GPIO.output(18, not GPIO.input(18))
	GPIO.output(27, not GPIO.input(27))

main()

