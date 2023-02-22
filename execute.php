<?php

// include the database class
require_once 'database.php';

// create a new instance of the database class
$db = new DatabaseClass();

try {
    // execute the SELECT statement
    $users= $db->select();

    // print the result
    foreach ($users as $user) {
        echo "{$user['id']} | {$user['name']} | {$user['email']} | {$user['mobile']} | {$user['password'] }<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}