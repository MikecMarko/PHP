<?php

class Product extends ProductAbstract {

    protected $addLogerCallable = [Logger::class, 'log'];

    public function setLoggerCallable(callable $callable) {
        $this->addLogerCallable = $callable;
    }

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function fetchProductById($id)
    {
        //imaginary call to DB
        $product = 'product 1';

        $this->session->write($product);

        //Logger::log($product);

       call_user_func($this->addLogerCallable, $product);

        return $product;
    }
}