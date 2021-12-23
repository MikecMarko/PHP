<?php

class Product {
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function fetchProductById($id)
    {
        //imaginary call to DB
        $product = 'product 1';

        $this->session->write($product);

        return $product;
    }
}