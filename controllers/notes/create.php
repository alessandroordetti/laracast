<?php 

require base_path('Validator.php');

$config = require base_path('config.php');

$db = new Database($config['database']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

   if(! Validator::string($_POST['body'])){
      $errors['body'] = "The note doesn't fit requirements :(";
   }

   if(empty($errors)){
      $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',[
         ':body' => $_POST['body'], //Questo non previene l'injection di codice malevolo 
         ':user_id' => 1
      ]);
   }

}

view('notes/create.view.php',[
   'errors' => $errors
]);