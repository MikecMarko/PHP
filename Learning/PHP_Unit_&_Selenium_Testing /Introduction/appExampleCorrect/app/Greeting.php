<?php
namespace App;

class Greeting {

    protected $user_repo;
    protected $current_hour;

    public function __construct(UserRepositoryInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function setCurrentHour($hour)
    {
        $this->current_hour = $hour;
    }

    public function greetTheUser($id)
    {
        $user = $this->user_repo->getUser($id);
        
        if($this->current_hour  >= 5 && $this->current_hour < 12 ) $greeting = 'Good morning ';
        elseif($this->current_hour  >= 12 && $this->current_hour < 17 ) $greeting = 'Good afternoon ';
        elseif($this->current_hour  >= 17 && $this->current_hour <= 23 ) $greeting = 'Good evening ';
        else $greeting = 'You should go to sleep :) ';

        // $greeting = $this->greeting();

        return $greeting . $user['name'];
    }

    // private function greeting()
    // {
    //     if($this->current_hour  >= 5 && $this->current_hour < 12 ) $greeting = 'Good morning ';
    //     elseif($this->current_hour  >= 12 && $this->current_hour < 17 ) $greeting = 'Good afternoon ';
    //     elseif($this->current_hour  >= 17 && $this->current_hour <= 23 ) $greeting = 'Good evening ';
    //     else $greeting = 'You should go to sleep :) ';

    //     // return $greeting;
    // }
}
