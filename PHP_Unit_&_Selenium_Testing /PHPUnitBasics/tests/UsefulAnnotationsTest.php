<?php

    use PHPUnit\Framework\TestCase;

    class UsefulAnnotationsTest extends TestCase
    {
        private $value;

        /**
         *  @before
         */
        public function runBeforeEachTestMethod() {
            $this->value = $this->value+1;
        }

        /**
         *  @after
         */
        public function runAfterEachTestMethod() {
            unset($this->value);
        }

        public function test1() {
            $expected = 1;
            $result = $this->value;

            $this->assertEquals($expected,$result);
        }

        public function test2() {
            $this->value++;
            $expected = 2;
            $result = $this->value;

            $this->assertEquals($expected,$result);
        }
    }