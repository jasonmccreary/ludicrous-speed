<?php

use App\DB;

require '../bootstrap.php';


$result = DB::connection()->query("SELECT * FROM package_detail WHERE package_id = (SELECT id FROM packages WHERE name = 'monolog/monolog')");

$package = $result->fetch_assoc();

header('Content-Type: application/json');
echo $package['data'];
