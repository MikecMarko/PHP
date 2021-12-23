<?php
namespace App;

class SQLiteUserRepository implements UserRepositoryInterface {
 
    protected $db;
 
    public function __construct()
    {
        $this->db = new \PDO("sqlite:../db/phpsqlite.db");
    }
 
    public function getUser($id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
        $stmt->execute([$id]); 
        $user = $stmt->fetch();
        
        if($user)
        return $user;

        return null;

    }
 
}

