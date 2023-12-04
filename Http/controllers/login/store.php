<?php 

use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;

$authenticator = new Authenticator();

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)){
    return view('login/create.view.php', [
        'errors' => $form->errors()
    ]);
} else {
    $user = App::resolve('Core\Database')->query("SELECT * FROM users WHERE email = :email", [
        ':email' => $email
    ])->find();

    if(!$user){
        $message = 'User not found!';
        return view('login/create.view.php', ['message' => $message]);
    }
    
    if($email == 'alessandro.ord@gmail.com'){
        $authenticator->setSessionVariable('admin', $email);
        redirect('/admin-index');
    } else {
        $authenticator->setSessionVariable('auth', $email);
        redirect('/');
    }

    
}








