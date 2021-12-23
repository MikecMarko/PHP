<?php

use PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase {

    //mainly for strings
    public function testAssertSame() {
        $expected = 'Baz';
        $result = 'Baz';

        $this->assertSame($expected, $result);
    }
    //mainly for numbers
    public function testAssertEquals() {
        $expected = 2;
        $result = 2;

        $this->assertEquals($expected, $result);
    }

    public function testAssertEmpty() {
        $this->assertEmpty([]);
    }
    //only for arrays
    public function testAssertNull() {

        $this->assertEmpty([]);
    }

    public function testIsGreater() {
        $expected = 2;
        $result = 1;

        $this->assertGreaterThan($result, $expected);
    }

    public function testIsFalse() {
        $this->assertTrue(true);
    }

    public function testIsTrue() {

        $this->assertFalse(false);
    }

    public function testCount() {

        $this->assertCount(3, [3,3,3]);
    }

    public function testContain() {

        $this->assertContains(3, [3,3,3,3]);
    }

    public function testStringContainsString() {

        $this->assertStringContainsString('foo', 'foo');
    }

    public function testInstanceOff() {

        $this->assertInstanceOf(Exception::class, new Exception());
    }

    public function testArrayHasKey() {

        $this->assertArrayHasKey('key', ['key' => 'value']);
    }
}