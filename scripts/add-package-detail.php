<?php

$mysqli = new mysqli('127.0.0.1', 'dbuser', 'dbpass', 'development');

$mysqli->query('TRUNCATE TABLE package_detail');

$result = $mysqli->query("SELECT id FROM packages WHERE name = 'monolog/monolog'");

if ($result->num_rows === 0) {
    die('Could not find package. Did you run the import script first?');
}

$package = $result->fetch_assoc();

$stmt = $mysqli->prepare("INSERT INTO package_detail (package_id, data) VALUES (?, ?)");

$data = file_get_contents('data/monolog.json');
$stmt->bind_param("is", $package['id'], $data);
$stmt->execute();

$stmt->close();
$mysqli->close();
