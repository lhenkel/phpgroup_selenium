Browser Automation

This is based on this library from Facebook:

https://github.com/facebook/php-webdriver

To make it work, you need to download a couple things. 

1) Selenium standalone server: https://www.seleniumhq.org/download/  It standardizes the calls to the browser executables, which are:

2) You need to download a different version of Chrome, Firefox, etc.  Here's Chrome: http://chromedriver.chromium.org/  Here's Firefox:  https://github.com/mozilla/geckodriver/releases

Download the browsers to some place in your executables path.

On Windows, I have a batch script that kicks off the selenium server and opens another command prompt.  It's not necessary, but sometimes I forget to start it and wonder why my scripts are failing.  It looks like this:

cd C:\wherever_jar_is\selenium
start cmd /k echo Rarin to go..
java -jar selenium-server-standalone-3.5.1.jar

Basically it.  If you want to run these demos, run "composer install"
