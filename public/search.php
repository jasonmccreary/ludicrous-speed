<?php

use App\DB;
use App\Redis;

require '../bootstrap.php';


$key = 'package:search:' . $_GET['q'];
$data = Redis::connection()->get($key);

if (is_null($data)) {
    $sql = sprintf("SELECT * FROM packages WHERE name LIKE '%%%s%%'", DB::connection()->real_escape_string($_GET['q']));

    $result = DB::connection()->query($sql);

    $data = json_encode([
        'results' => $result->fetch_all(MYSQLI_ASSOC)
    ]);

    Redis::connection()->set($key, $data);
}


header('Content-Type: application/json');
echo $data;
