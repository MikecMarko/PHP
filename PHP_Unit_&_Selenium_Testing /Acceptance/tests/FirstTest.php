<?php

class FirstTest extends PHPUnit_Extensions_Selenium2TestCase {

    protected function setUp(): void
    {
        $this->setBrowserUrl('http://localhost/PersonalProjects/Programming/PHP/PHP_Unit_&_Selenium_Testing%20/Acceptance/src/testingHTMLPage.html');
        $this->setBrowser('chrome');
        // test get elements doesn't work unless we use this as well
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
        // and that is because php selenium doesn't support W3C mode yet
    }

    public function testTitle()
    {
        $this->url('');
        $this->assertEquals('HTML by Adam Morse, mrmrs.cc', $this->title());
    }

    public function testGettingElements()
    {
        $this->url('');
        $h1 = $this->byCssSelector('header h1');
        // we can search different classes and elements ( but first matching element)
        $this->assertContains('HTML', $h1->text());
        // this returns all existing h1 elements on page
        $h1 = $this->elements($this->using('css selector')->value('h1'));
        $this->assertEquals(16, count($h1));

        $this->assertContains('Headings', $h1[2]->text());

        $field = $this->byId('first-name');
        $this->assertSame('Adam', $field->value()); // we can provide some atributes as field name or something
        $this->assertSame('Adam', $field->attribute('value'));

        $link = $this->byId('google-link-id');
        $this->assertSame('Google', $link->text());
        
    }
}