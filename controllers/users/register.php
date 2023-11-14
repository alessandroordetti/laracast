<?php 

if($_SESSION['user'] ?? false){
    header('location: /');

    exit();
}

return view('registration/create.view.php');