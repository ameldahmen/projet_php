<?php

include 'database.php';

$db= new DatabaseClass();

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $db->Remove($id);
}
header("Location: display.php");
exit;
?>