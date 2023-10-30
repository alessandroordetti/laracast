<?php 

$config = require 'config.php';

$db = new Database($config['database']);

$notes = $db->query("SELECT * FROM notes")->fetchAll();

require 'views/notes.view.php';