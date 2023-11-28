<?php

use Core\App;
use Core\Database;
use Core\Fakedata;

$db = App::resolve(Database::class);

// Resolve the Fakedata service
$fakedata = App::resolve(Fakedata::class);

// Use the $fakedata instance to get your fake data
$fakeData = $fakedata->generateData(); // Assuming there's a getFakeData method

// Insert fake data using the $db instance
foreach ($fakeData as $data) {
    // Ensure that $data is an associative array with keys 'body' and 'user_id'
    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $data,
        'user_id' => 1
    ]);
}

view('admin/data-success-view.php');