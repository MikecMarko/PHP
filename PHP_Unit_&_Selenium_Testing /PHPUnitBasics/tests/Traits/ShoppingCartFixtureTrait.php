<?php


trait ShoppingCartFixtureTrait {
    protected $cart;

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

}