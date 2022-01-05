<?php

    namespace forStubMockTesting;


    class User
    {
        public $email;
        public $name;

        public function __construct()
        {
            echo 'Constructor was called end succeeded';
        }

        public function createUser($email, $name)
        {
            $this->name = $name;
            $this->email = $email;

            if($this->validate()){
                return $this->save();
            } else {
                return false;
            }
        }

        public function validate()
        {
            if(!empty($this->name) && filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                return true;
            } else {
                return false;
            }
        }

        public function save()
        {
            echo 'User was saved in database - real operation';
            return true;
        }
    }