<?php 

$config = require 'config.php';

$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

   $errors = [];


   if(strlen($_POST['body']) === 0){
      $errors['body'] = "Campo obbligatorio mancante";
   }

   if(empty($errors)){
      $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',[
         ':body' => $_POST['body'], //Questo non previene l'injection di codice malevolo 
         ':user_id' => 1
      ]);
   }

}

require ('views/note-create.view.php');