<?php

class SecondTest extends PHPUnit_Extensions_Selenium2TestCase {

    protected function setUp(): void
    {
        $this->setBrowserUrl('http://localhost/PersonalProjects/Programming/PHP/PHP_Unit_&_Selenium_Testing%20/Acceptance/src/testingHTMLPage2.html');
        $this->setBrowser('chrome');
        // test get elements doesn't work unless we use this as well
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
        // and that is because php selenium doesn't support W3C mode yet
    }

    public function testForms()
    {
        $this->url('');

        $this->select($this->byId('option-element'))->selectOptionByLabel('Option 2');

        $this->assertSame('option-2', $this->select($this->byId('option-element'))->selectedValue());
        $this->select($this->byId('option-element'))->clearSelectedOptions();

        $userNameInput = $this->byName('some_input_name');
        $userNameInput->value('Marko');
        //$userNameInput->clear();
        $this->assertSame('Marko', $userNameInput->value());

        $radios = $this->elements($this->using('css selector')->value('input[type="radio"]'));
        $radios[0]->click();
        $this->byCssSelector('input[type="checkbox"]')->click();

        $this->byTag('textarea')->value('Some text');

        $this->clickOnElement('submit-button');
        //we can also click it without any validation, check video
        $this->assertContains('The form was sent!', $this->source());
    }

    public function testInCompleteTest()
    {
//        $this->markTestIncomplete('Something isnt supported');
//
//        $this->assertSame('Jonh', 'John');

        $this->url('');
        $this->cookie()->add('user', 'logged-in')->set();
        // $this->>cookie()->remove('user);
        $authCookie = $this->cookie()->get('user');
        $this->assertEquals('logged-in', $authCookie);
    }
}