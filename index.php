<?php 

require 'functions.php';
require 'router.php';
require 'Database.php';
$config = require 'config.php';

$db = new Database($config['databse']);


$id = $_GET['user_id'];
$query= "SELECT * FROM notes WHERE user_id = {$id}";

$posts = $db->query($query)->fetchAll();

dd($posts);
