<?php

use PHPUnit\Framework\TestCase;

class UnitTestableTest extends TestCase
{
    public function test_daily_quote()
    {
        $mockedDataSource = new class extends DataSource  {
            public function fetchQuote($person)
            {
                return '';
            }
        };

        $test = new UnitTestable($mockedDataSource);

        $test->setRandomNumber(0);
        $this->assertSame('Today the quote from one the famous physicist Albert Einstein: ', $test->getRandomQoute());

        $test->setRandomNumber(1);
        $this->assertSame('Today the quote from head of the Catholic Church and sovereign of the Vatican City Pope John Paul II: ', $test->getRandomQoute());

        $test->setRandomNumber(2);
        $this->assertSame('Today the quote from the co-founder of Microsoft Corporation Bill Gates: ',  $test->getRandomQoute());
    }
}