<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$latest5Users = $db->query("SELECT users.email FROM users LIMIT 5 ")->get();


view('admin/index-view.php', [
    'latestUsers' => $latest5Users
]);