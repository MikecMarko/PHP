<?php

namespace forTestingAbstractClassesAndTraits;

class Employee extends PersonAbstractClass
{
    public function getSalary()
    {
        return 50 * 100;
    }
}