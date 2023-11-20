<?php 


use Core\App;
use Core\Database;

$email = $_POST['email'];

$db = App::resolve(Database::class);

$email = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $email
])->get();

if($email){
    $_SESSION['user'] = [
        'email' => $email
    ];
    
    header('location: /');
    exit();
}