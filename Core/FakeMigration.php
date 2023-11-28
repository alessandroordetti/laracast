<?php 

namespace Core;

use Core\Database;

class FakeMigration 
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
}
