<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct()
    {
        //$product = new Product(new Session());

        $session = new class implements SessionInterface {
            public function open()
            {
                // TODO: Implement open() method.
            }
            public function write($product)
            {
                echo 'mock writting to the session';
            }
            public function close()
            {
                // TODO: Implement close() method.
            }
        };

        $product = new Product($session);

        $this->assertSame('product 1', $product->fetchProductById(1));
    }
}
