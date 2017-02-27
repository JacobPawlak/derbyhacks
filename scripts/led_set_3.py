#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017 (Febrauary 24th, 2017)
#Raspberry pi controller for LEDs

import RPi.GPIO as GPIO
from time import *
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
def main():

	GPIO.setup(20, GPIO.OUT)
	GPIO.setup(21, GPIO.OUT)
	GPIO.setup(26, GPIO.OUT)
	print "LED 1 ON"
	print "LED 2 ON"
	print "LED 3 ON"
	GPIO.output(20, not GPIO.input(20))
	GPIO.output(21, not GPIO.input(21))
	GPIO.output(26, not GPIO.input(26))

main()
