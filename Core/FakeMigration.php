<?php 

namespace Core;

use Core\App;
use Core\Database;
use Core\Fakedata;

class FakeMigration 
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
}
