<?php

use PHPUnit\Framework\TestCase;
use forTestingAbstractClassesAndTraits\Employee;
use forTestingAbstractClassesAndTraits\PersonAbstractClass;

class EmployeeTest extends TestCase
{
    public function testFullName()
    {
        $mock = $this->getMockBuilder(\forTestingAbstractClassesAndTraits\PersonAbstractClass::class)
            ->setConstructorArgs(['John', 'Dove'])
            ->getMockForAbstractClass();

        $mock->expects($this->any())
            ->method('getSalary')
            ->willReturn(6000);

        $this->assertSame('John Dove earns 6000 per month', $mock->showFullNameAndSalary());
    }
}