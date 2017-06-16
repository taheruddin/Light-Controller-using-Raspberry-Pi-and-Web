# sudo python3 /home/pi/Desktop/light_controller.py
import json, requests

import wiringpi as wirePi
import RPi.GPIO as GPIO
import time

#url = 'http://192.168.1.75/light_controller/index.php?need_for=json'
url = 'http://stardev.net/light_controller/index.php?need_for=json'

params = dict(
    need_for='json',
    asking_by='raspberry_pi',
)

response = requests.get(url)
data = json.loads(response.text)

print("red = "+str(data["red"])+" yellow = "+str(data["yellow"])+" blue = "+str(data["blue"]))

GPIO.setmode(GPIO.BCM)
red   = 5
yellow = 6
blue = 13

while True:
    time.sleep(5)
    response = requests.get(url)
    data = json.loads(response.text)
    print("red = "+str(data["red"])+" yellow = "+str(data["yellow"])+" blue = "+str(data["blue"]))

    if data["red"]=="1":
        GPIO.setup(red, GPIO.OUT)
        GPIO.output(red, GPIO.HIGH)
    else:
        GPIO.setup(red, GPIO.OUT)
        GPIO.output(red, GPIO.LOW)

    if data["yellow"]=="1":
        GPIO.setup(yellow, GPIO.OUT)
        GPIO.output(yellow, GPIO.HIGH)
    else:
        GPIO.setup(yellow, GPIO.OUT)
        GPIO.output(yellow, GPIO.LOW)

    if data["blue"]=="1":
        GPIO.setup(blue, GPIO.OUT)
        GPIO.output(blue, GPIO.HIGH)
    else:
        GPIO.setup(blue, GPIO.OUT)
        GPIO.output(blue, GPIO.LOW)
        
        



#-------------------------------------------
'''
# input pin
button = 4

wirePi.wiringPiSetupGpio()

wirePi.pinMode(button, 0)

wirePi.pullUpDnControl(button, wirePi.PUD_DOWN)


while True:

    if wirePi.digitalRead(button):
        print ("Button ON")
    else:
        print ("Button OFF")
'''










	
