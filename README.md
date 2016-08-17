# Save my Location
Saves GPS location to a database

This program will save the GPS location to a database.  PHP, MySQL and JavaScript. 

This program is in the early stages of development.  

#Setup
To run PHP scripts your server must support PHP or you can run a local development environment that does. 
I use WAMP Server with my local development environment.  
Install WAMP Server.
http://www.wampserver.com/en/<br />
Video to get your first script running. 
https://www.youtube.com/watch?v=FetZusBljQU

You can use phpMyAdmin which comes with the WAMP installation to run the follow SQL queries to set up the Database. <br />
CREATE DATABASE location;<br />
CREATE TABLE gps(nameofspot VARCHAR(255), l VARCHAR(255), g VARCHAR(255));<br />

Get an API key from google
https://developers.google.com/maps/documentation/javascript/get-api-key
