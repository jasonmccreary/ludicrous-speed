<?php

use App\DB;
use App\Redis;

require '../bootstrap.php';

$key = 'package:popular';

if (!Redis::connection()->exists($key)) {
    $result = DB::connection()->query('SELECT name, downloads FROM packages ORDER BY downloads DESC LIMIT 100');

    $data = [];
    $scores = [];
    while($package = $result->fetch_assoc()) {
        $data[] = $package;
        $scores[$package['name']] = $package['downloads'];
    }

    Redis::connection()->zadd($key, $scores);
} else {
    $scores = Redis::connection()->zrevrange($key, 0, 100, ['WITHSCORES' => true]);

    $data = [];
    foreach ($scores as $name => $downloads) {
        $data[] = compact('name', 'downloads');
    }
}


header('Content-Type: application/json');
echo json_encode([
    'results' => $data
]);
