<?php

use App\DB;
use App\Redis;

require '../bootstrap.php';

$key = 'package:detail:monolog';
$data = Redis::connection()->get($key);

if (is_null($data)) {
    $result = DB::connection()->query("SELECT * FROM package_detail WHERE package_id = (SELECT id FROM packages WHERE name = 'monolog/monolog')");

    $data = $result->fetch_assoc()['data'];
    Redis::connection()->set($key, $data);
}

header('Content-Type: application/json');
echo $data;
