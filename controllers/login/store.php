<?php 


use Core\App;
use Core\Database;

$email = $_POST['email'];

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $email
])->get();


if($user[0]['email'] !== 'alessandro.ord@gmail.com'){

    dd('autenticato');

    login('auth', $user[0]['email']);

    header('location: /');
    exit();
} else {

    login('admin', $user[0]['email']);

    header('location: /admin-index');
    exit();
}
