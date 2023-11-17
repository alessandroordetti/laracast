<?php

use Core\FakeMigration;

$migration = new FakeMigration();

$datas = $migration->run();


view('admin/data-success-view.php', [
    'datas' => $datas
]);