<?php

$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'transzpi'
];

// Tworzenie połączenia z bazą danych
$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['db_name']);

// Sprawdzanie połączenia z bazą danych
if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

defined("TEMPLATES")
or define("TEMPLATES", realpath(dirname(__FILE__) . '/resources/templates'));