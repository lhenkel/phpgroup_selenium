<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once 'vendor/autoload.php';

$host = 'http://localhost:4444/wd/hub'; // this is the default

$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);

$driver->manage()->deleteAllCookies();

$driver->get('https://www.cnn.com/business');

// Timeouts in milliseconds.  Really you'd probably want to put these
// in try catch and yell at someone if it's that slow
$driver->wait(100, 50000)->until(
	WebDriverExpectedCondition::titleContains('News')
);

// Clicks the first link
//$driver->findElement(WebDriverBy::cssSelector('span.cd__headline-text'))->click();

// Clicks the second link.  Found using Chrome tool "Selector Gadget"
$driver->findElement(WebDriverBy::xpath('//*[contains(concat( " ", @class, " " ), concat( " ", "cd__headline-text", " " ))]'))->click();

$driver->wait(100, 50000)->until(
	WebDriverExpectedCondition::visibilityOfElementLocated(
		WebDriverBy::cssSelector('h1.pg-headline'))
);

$headlineElement = $driver->findElement(WebDriverBy::cssSelector('.pg-headline'));
print "\nHeadline is: " . $headlineElement->getText() . "\n";

// You can take pictures of elements if you want, this does the whole page
$driver->takeScreenshot('./screenshots/cnn_' . time() . '.png');

$driver->close();

?>