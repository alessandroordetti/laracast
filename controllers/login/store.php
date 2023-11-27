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
    $user = $db->query("SELECT * FROM users WHERE email = :email", [
        ':email' => $email
    ])->find();
    

    /* If the user doesn't exist */
    if(!$user){
        $errors['user'] = 'User or password not correct';

        return view('login/create.view.php', [
            'errors' => $errors
        ]);
    }

    /* If the user exists and the password corresponds */
    if($user && password_verify($password, $user['password'])){

        /* If the user is not an admin */
        if($user['email'] !== 'alessandro.ord@gmail.com'){
        
            setSessionVariable('auth', $user['email']);
        
            header('location: /');
            exit();
        
        /* If the user is an admin */
        } else {
        
            setSessionVariable('admin', $user['email'], $user['name']);
        
            header('location: /admin-index');
            exit();

        
        }
    }
    
    return view('login/create.view.php', [
        'password' => $password
    ]);
}

