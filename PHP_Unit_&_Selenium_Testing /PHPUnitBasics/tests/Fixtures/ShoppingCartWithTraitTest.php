<?php

use PHPUnit\Framework\TestCase;

class ShoppingCartWithTraitTest extends TestCase
{
    use DatabaseTrait;
    use ShoppingCartFixtureTrait;

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
}