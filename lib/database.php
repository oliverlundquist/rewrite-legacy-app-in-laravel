<?php

$mysqli = new mysqli('mysql', 'root', 'root', 'legacy-app');

if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
