<?php

use App\Greeting;


class GreetingTest extends PHPUnit\Framework\TestCase
{
    public function testCanSeeCorrectGreetings()
    {
        $greeting = new Greeting();
        $id = $_GET['id'] ?? null;

        // $result =  file_get_contents('http://localhost:8000/?id=1');
        // $this->assertSame('Good evening Adam',$result);

        $this->assertSame('Good morning Adam',$greeting->greetTheUser($id));

        $this->assertSame('Good afternoon Adam',$greeting->greetTheUser($id));

        $this->assertSame('Good evening Adam',$greeting->greetTheUser($id));
    }

}   
