<?php 

use Core\Authenticator;
use Http\Forms\LoginForm;

$authenticator = new Authenticator();

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

/* Se la validazione fallisce */
if (! $form->validate($email, $password)){
    return view('login/create.view.php', [
        'errors' => $form->errors()
    ]);
} 

/* Se il login fallisce */
if (!$authenticator->attempt($email, $password)){
    return view('login/create.view.php', [
        'error' => 'User or password not correct'
    ]);
} 

/* Login riuscito */
if($_SESSION['admin']){
    $_SESSION['admin'] = 'Alessandro';
    redirect('/admin-index');
} else {
    redirect('/');
}











