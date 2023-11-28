<?php 


use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)){
    return view('login/create.view.php', [
        'errors' => $form->errors()
    ]);
};



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
        
        setSessionVariable('auth', $user);

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


