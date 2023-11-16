<?php 

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

$faker = Faker\Factory::create();
   
if(! Validator::string($_POST['body'])){
    $errors['body'] = "The note doesn't fit requirements :(";
}

if(!empty($errors)){
    return view('notes/create.view.php',[
        'errors' => $errors
    ]);
}

if(isset($_SESSION['admin'])){
    for ($i = 0; $i < 100; $i++) {
        $name = $faker->name;
        $email = $faker->email;
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',[
            ':body' => $_POST['body'], //Questo non previene l'injection di codice malevolo 
            ':user_id' => 1
        ]);
    }
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',[
    ':body' => $_POST['body'], //Questo non previene l'injection di codice malevolo 
    ':user_id' => 1
]);



header('location: /notes');
die();

