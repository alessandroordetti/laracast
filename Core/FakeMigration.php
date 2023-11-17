<?php 

namespace Core;

use Core\App;
use Core\Database;
use Core\Fakedata;

class FakeMigration 
{
    protected $db;
    protected $data; 

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
        $this->data = Fakedata::generateData(); 
    }

    public function run()
    {

        $allData = [];

        foreach ($this->data as $text) {
            $fakeData = [
                'body'    => $text,
                'user_id' => 1
            ];

            $this->db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', $fakeData);

            $allData[] = $fakeData;
        }

        return $allData;
    }
}
