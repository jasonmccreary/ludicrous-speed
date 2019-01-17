<?php

$file = $argv[1];

if (($handle = fopen($file, "r")) === false) {
    die('Could not open ' . $file . ' for reading...');
}

$data = json_decode(file_get_contents($file), true);

$mysqli = new mysqli('127.0.0.1', 'dbuser', 'dbpass', 'development');

$mysqli->query('TRUNCATE TABLE packages');

$stmt = $mysqli->prepare('INSERT INTO packages (name, downloads) VALUES (?, ?)');

foreach ($data['packageNames'] as $name) {
    $downloads = array_sum(unpack('C*', $name));
    $stmt->bind_param("si", $name, $downloads);
    $stmt->execute();
}

$stmt->close();
$mysqli->close();
