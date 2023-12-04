<?php 

use Core\App;
use Core\Database;
use Core\Validator;

use Core\Authenticator;

$authenticator = new Authenticator();


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email';
}

if(!Validator::string($password, 7, 25)){
    $errors['password'] = 'Please provide a valid password';
}

if(!empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    ':email' => $email
])->find();

if($user){
    header('location: /');
} else {

    if($email == 'alessandro.ord@gmail.com'){
        $user = $db->query('INSERT INTO users (id, email, password) VALUES (:id, :email, :password)',[
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'id' => 1
        ]);

        $_SESSION['admin'] = [
            'email' => $email
        ];

        header('location: /admin-index');
        exit();
    } else {
        $user = $db->query('INSERT INTO users (email, password) VALUES (:email, :password)',[
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        $auth = $authenticator->setSessionVariable('auth', $email);

        header('location: /');
        exit();
    }
}

