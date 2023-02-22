<?php 
include 'database.php';

$db= new DatabaseClass();

$db->Insert($_POST);

header('location:insert.php');

?> 




