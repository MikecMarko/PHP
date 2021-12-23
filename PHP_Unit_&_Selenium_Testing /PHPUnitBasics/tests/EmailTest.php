<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider emailsProvider
     */
    public function testValidEmail($email) {
        $this->assertRegExp('/^.+\@\S+\.\S+$/',$email);
    }

    public function emailsProvider() {
        return [
            ['random1@mail.com'],
            ['random2@mail.hr'],
            ['random3@mail.nl'],
        ];
    }

    /**
     * @dataProvider numbersProvider
     */
    public function testMath($a, $b, $expected) {
        $result = $a*$b;
        $this->assertEquals($expected, $result);
    }

    public function numbersProvider() {
        return [
            [2,2,4],
            [4,4,16],
            [2,4,8],
        ];
    }

}