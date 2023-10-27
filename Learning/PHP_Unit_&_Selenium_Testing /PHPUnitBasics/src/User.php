<?php

class Database {
    public function getEmailAndLastName() {
        echo 'Real database touched';
    }
}

class User {
    protected $name;
    private $lastName;
    private $db;

    public function __construct($name, $lastName) {
        $this->name = ucfirst($name);
        $this->lastName = ucfirst($lastName);
        $this->db = new Database;
    }

    public function getFullName() {
        $this->db->getEmailAndLastName();
        return $this->name .' '.  $this->lastName;
    }

    private function hashPassword() {
        return 'Password is hashed';
    }
}