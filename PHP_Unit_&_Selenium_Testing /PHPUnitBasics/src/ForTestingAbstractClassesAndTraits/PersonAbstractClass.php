<?php

namespace forTestingAbstractClassesAndTraits;

abstract class PersonAbstractClass
{
    protected string $firstName;
    protected string $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    abstract public function getSalary();

    public function showFullNameAndSalary()
    {
        return $this->firstName. '' . $this->lastName. ' earns ' . $this->getSalary(). ' per month';
    }


}