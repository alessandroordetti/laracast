<?php 


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::email($email)){
    $errors['email'] = 'Please, provide a valid email.';
}

if(!Validator::string($password)){
    $errors['password'] = 'Please, provide a valid password.';
}


/* Login went wrong  */
if(!empty($errors)){

    return view('login/create.view.php', [
        'errors' => $errors
    ]);

/* Login successfully passed */
} else {

    $user = $db->query("SELECT * FROM users WHERE email = :email AND password = :password", [
        ':email' => $email,
        ':password' => $password
    ])->get();

    if(!$user){
        $errors['user'] = 'User or password not correct';

        return view('login/create.view.php', [
            'errors' => $errors
        ]);
    }
    
    /* If the user is not an admin */
    if($user[0]['email'] !== 'alessandro.ord@gmail.com'){
    
        login('auth', $user[0]['email']);
    
        header('location: /');
        exit();
    
    /* If the user is an admin */
    } else {
    
        login('admin', $user[0]['email']);
    
        header('location: /admin-index');
        exit();
    }
}

