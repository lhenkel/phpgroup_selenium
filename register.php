<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once 'vendor/autoload.php';

$host = 'http://localhost:4444/wd/hub'; // this is the default

$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);

$driver->manage()->deleteAllCookies();

$driver->get('https://www.webstaurantstore.com/myaccount.html?goto=register');

// Timeouts in milliseconds.  Really you'd probably want to put these
// in try catch and yell at someone if it's that slow
$driver->wait(100, 50000)->until(
	WebDriverExpectedCondition::titleContains('My Account')
);

$driver->findElement(WebDriverBy::id("email"))->sendKeys('some.guy@cnn.com');
$driver->findElement(WebDriverBy::id("billname"))->sendKeys('Bill');

$select = new WebDriverSelect($driver->findElement(WebDriverBy::id('billcompany_type')));
$select->selectByValue('Beer Distributor'); // Black

$driver->findElement(WebDriverBy::id("billaddr"))->sendKeys('123 Some Street');
$driver->findElement(WebDriverBy::id("billzip"))->sendKeys('12345');
$driver->findElement(WebDriverBy::id("billphone"))->sendKeys('208-345-4453');
$driver->findElement(WebDriverBy::id("password"))->sendKeys('hunter2');

//$driver->findElement(WebDriverBy::id('complete_registration'))->click();
