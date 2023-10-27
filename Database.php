<?php 

class Database {

    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;user=root;dbname=my_app";

        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        
        
        $statement = $this->connection->prepare($query);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
        
    }
}
