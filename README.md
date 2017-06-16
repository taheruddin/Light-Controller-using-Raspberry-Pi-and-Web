
# Light Controller using Raspberry Pi and Web Server!
 
# Objectives
- Enabling raspberry pi to pull data from a web server and according to this data turn on and turn off LEDs connected to GPIO. 
- Making a web based interface to change that data of the states of lights stored on web server. 
 
 
# Hardware 
- Raspberry Pi 2 b
- LED - red, yellow, blue
- Resistor 330k
- Breadboard 
- Jamper wire 
- Pi wage 
- Web server - static public ip
 
# Software
- Raspbian 
- LAMP stack on web server
 
# Programming
- Python
- Php
 
# How to deploy 
- Setup a LAMP/WAMP/MAMP/XAMPP server with static ip. Having a hosting is not required for demo, but in that case it will work locally. 
- Place the index.php in the web server.
- Create a MySQL database and Create a table “states” with column “red”, “blue”, “yellow” and insert a row with value “0” for all 3 of the columns. 
- Change the value of $username, $password, $dbname
- Change the value of $index_url in index.php to your index url.
- Connect LEDs and resistors and power up the raspberry pi. Raspbian works fine.
- Place “light_controller.py” on desktop and change the value of “url” to your one.
- Now run in terminal “sudo python3 /home/pi/Desktop/light_controller.py”
- Open the index_url in a browser and try to turn on and off the lights. 