<?php

namespace forStubMockTesting;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testSaveProduct() {
//        $loggerMock = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()
//            ->setMethods(['log'])
//            ->getMock();

        $loggerMock = $this->createMock(Logger::class);
        $loggerMock->expects($this->once())->method('log')->with(
            $this->equalTo('error'),
            $this->anything()
        );

        $product = new Product($loggerMock);

        $this->assertFalse($product->saveProduct('Panasonic', 'price'));
    }

    public function testSaveProduct2()
    {
        $loggerMock = $this->createMock(Logger::class);
        $loggerMock->expects($this->exactly(2))->method('log')
            ->withConsecutive(
                [$this->equalTo('notice'), $this->stringContains('Price greater than 10')],
                [$this->equalTo('success'), 'Product was saved']
            );

        $product = new Product($loggerMock);
        $product->saveProduct('Panasonic',11);
    }


}
