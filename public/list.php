<?php

use App\DB;

require '../bootstrap.php';


$result = DB::connection()->query('SELECT name FROM packages');


header('Content-Type: application/json');
echo json_encode([
    'packageNames' => $result->fetch_all()
]);
