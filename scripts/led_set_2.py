#Jacob Pawlak and Ryan Shah
#DerbyHacks 2017 (Febrauary 24th, 2017)
#Raspberry pi controller for LEDs

import RPi.GPIO as GPIO
from time import *
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
def main():

	GPIO.setup(22, GPIO.OUT)
	GPIO.setup(23, GPIO.OUT)
	GPIO.setup(24, GPIO.OUT)
	print "LED 1 ON"
	print "LED 2 ON"
	print "LED 3 ON"
	GPIO.output(22, not GPIO.input(22))
	GPIO.output(23, not GPIO.input(23))
	GPIO.output(24, not GPIO.input(24))

main()
