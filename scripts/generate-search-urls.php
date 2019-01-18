<?php

use App\DB;

require 'bootstrap.php';

$base_url = 'http://localhost:8080/search.php';

$result = DB::connection()->query('SELECT id, name FROM packages ORDER BY RAND() LIMIT 100');

while ($package = $result->fetch_assoc()) {

    list($vendor, $project) = explode('/', $package['name']);

    $segment = $package['id'] & 1 ?  $vendor : $project;

    $length = strlen($segment);

    $query = substr($segment, rand(0, $length - 3));

    echo $base_url . '?q=' . $query . PHP_EOL;
}

echo $base_url . '?q=jasonmccreary' . PHP_EOL;
echo $base_url . '?q=laravel' . PHP_EOL;
echo $base_url . '?q=symfony' . PHP_EOL;
echo $base_url . '?q=wakanda' . PHP_EOL;

