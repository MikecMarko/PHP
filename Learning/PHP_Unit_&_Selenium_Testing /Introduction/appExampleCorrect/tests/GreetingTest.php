<?php

use App\Greeting;
use App\UserRepositoryInterface;

class GreetingTest extends PHPUnit\Framework\TestCase
{
    public function testCanSeeCorrectGreetings()
    {
        $greeting = new Greeting(new class implements UserRepositoryInterface {
            public function getUser($id)
            {
                return ['name'=>'Adam'];
            }
        });
        $current_hour = 8;
        $greeting->setCurrentHour($current_hour);
        $this->assertSame('Good morning Adam',$greeting->greetTheUser(1));

        $current_hour = 13;
        $greeting->setCurrentHour($current_hour);
        $this->assertSame('Good afternoon Adam',$greeting->greetTheUser(1));

        $current_hour = 20;
        $greeting->setCurrentHour($current_hour);
        $this->assertSame('Good evening Adam',$greeting->greetTheUser(1));
    }

}   
