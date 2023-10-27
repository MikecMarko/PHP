<?php

class ShoppingCart
{
    public $cartItem = [];
    public $amount;

    public function addItem($item){
        $this->cartItem[] = $item;
        $this->amount++;
    }

}