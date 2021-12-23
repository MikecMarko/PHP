<?php

use PHPUnit\Framework\TestCase;

class BMICalculatorTest extends TestCase {

    public function testUnderweightBmiTextResult() {

        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 10;

        $result = $BMICalculator->getTextResultFromBMI();

        $this->assertSame($result, 'Underweight');
    }

    public function testNormalBmiTextResult() {

        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 24;

        $result = $BMICalculator->getTextResultFromBMI();

        $this->assertSame($result, 'Normal');
    }

    public function testOverweightBmiTextResult() {

        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 65;

        $result = $BMICalculator->getTextResultFromBMI();

        $this->assertSame($result, 'Overweight');
    }

    public function testCorectBmiValue() {

        $BMICalculator = new BMICalculator;

        $BMICalculator->mass = 100;

        $BMICalculator->height = 1.6;

        $result = $BMICalculator->calculate();

        $this->assertEquals(39.1, $result);
    }

    public function testCanCalculateCorrectBmi() {
        $expected = 39.1;
        $Bcalculator = new BMICalculator();

        $Bcalculator->mass = 100;
        $Bcalculator->height = 1.6;

        $result = $Bcalculator->calculate();

        $this->assertEquals(BASEURL, 'http://localhost:8000');
    }
}