<?php 

require('Validator.php');

$config = require 'config.php';

$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

   $errors = [];


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

require ('views/note-create.view.php');