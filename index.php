<?php 

require 'functions.php';
require 'router.php';
require 'Database.php';
$config = require 'config.php';

$db = new Database($config);
$posts = $db->query("SELECT * FROM posts");
