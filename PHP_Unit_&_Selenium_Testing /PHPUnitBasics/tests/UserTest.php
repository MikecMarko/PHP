<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testFirstLastName()
    {
        $user = new User('donald', 'trump');
        $expected = 'Donald';

        $phpunit = $this;

        $closure = function () use($phpunit, $expected) {

        $phpunit->assertSame($expected, $this->name);
        };

        //closure instance
        $binding = $closure->bindTo($user, get_class($user));
        $binding();
    }

    public function testFirstLastNameSecond()
    {
        $user = new class('donald', 'trump') extends User {
            public function getName() {
                return $this->name;
            }
        };

        $this->assertSame('Donald', $user->getName());

    }

    public function testValidDataFormat() {
        $user = new User('donalt', 'trump');
        $mockedDb = new class extends Database {
            public function getEmailAndLastName()
            {
                echo 'Mocked DB, real DB not touched';
            }
        };

        $setUserClosure = function () use ($mockedDb) {
            $this->db = $mockedDb;
        };

        $executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));

        $executeSetUserClosure();

        $this->assertSame('Donalt Trump', $user->getFullName());
    }

    public function testPasswordHashed() {
        $user = new User('donald', 'trump');
        $expected = 'Password is hashed';

        $phpunit = $this;

        $assertClosure = function () use($phpunit, $expected) {
            $phpunit->assertSame($expected, $this->hashPassword());
        };

        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executeAssertClosure();
    }

    public function testPasswordHashedSecond() {
        $user = new class('donald', 'trump') extends User {
            public function getHashedPassword()
            {
                return $this->hashPassword();
            }
        };

        $this->assertSame('Password is hashed', $user->getHashedPassword());
    }
}