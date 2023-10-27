<?php

class WaittingTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp(): void
    {
        $this->setBrowserUrl('http://localhost/PersonalProjects/Programming/PHP/PHP_Unit_&_Selenium_Testing%20/Acceptance/src/testingHTMLPage.html');
        $this->setBrowser('chrome');
        // test get elements doesn't work unless we use this as well
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
        // and that is because php selenium doesn't support W3C mode yet
    }

    public function testExplicitWait()
    {
        $this->url('');

        $driver = $this;

        $this->waitUntil(function() use($driver){
            $item = $driver->byId('first-name');
            if($item->value() === 'Adam') return true;
            return null;
        }, 4000);

        $this->assertSame('Adam', $this->byId('first-name')->value());
    }
}