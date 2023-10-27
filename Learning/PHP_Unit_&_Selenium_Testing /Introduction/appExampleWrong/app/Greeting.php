<?php
namespace App;

class Greeting {


    public function greetTheUser()
    {
        $id = $_GET['id'];

        $db = new \PDO("sqlite:../db/phpsqlite.db");
        $stmt = $db->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
        $stmt->execute([$id]); 
        $user = $stmt->fetch();
        
        $current_hour = date("G");

        if($current_hour  >= 5 && $current_hour < 12 ) $greeting = 'Good morning ';
        elseif($current_hour  >= 12 && $current_hour < 17 ) $greeting = 'Good afternoon ';
        elseif($current_hour  >= 17 && $current_hour <= 23 ) $greeting = 'Good evening ';
        else $greeting = 'You should go to sleep :) ';

        return $greeting . $user['name'];
    }
}


