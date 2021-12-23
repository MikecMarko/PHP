<?php

use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
    protected $cart;

    protected static $db_connection = false;

    //always runs this before every existing test
    protected function setUp(): void
    {
        $this->cart = new ShoppingCart();
    }

    //always runs after before every existing test
    protected function tearDown(): void
    {
       unset($this->cart);
    }

    public function testCorrectNumberOfItems() {
        $this->cart->addItem('itemOne');
        $expected = 1;
        $result = $this->cart->amount;

        $this->assertEquals($expected,$result);
    }

    public function testCorrectProductName() {
        $this->cart->addItem('apples');

        $this->assertContains('apples',$this->cart->cartItem);
    }

    public static function setUpBeforeClass() :void{
        if(self::$db_connection) return;

        self::$db_connection = new \PDO('sqlite::database.db');
    }

    public static function tearDownAfterClass(): void
    {
        self::$db_connection = null;
        unlink(':database.db');

    }
}