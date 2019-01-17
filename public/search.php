<?php

use App\DB;

require '../bootstrap.php';


$sql = sprintf("SELECT * FROM packages WHERE name LIKE '%%%s%%'", DB::connection()->real_escape_string($_GET['q']));

$result = DB::connection()->query($sql);


header('Content-Type: application/json');
echo json_encode([
    'results' => $result->fetch_all(MYSQLI_ASSOC)
]);
