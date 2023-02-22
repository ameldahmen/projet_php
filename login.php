<?php

include 'database.php';

$db = new DatabaseClass();

if(isset($_POST['login'])){
   // $id = $_GET['updateid'];
    $data = array(
        
        'email' => $_POST['email'],
        
        'password' => $_POST['password']
    );
    $db->login( $data);
    
}
?>
<html>

<head>
</head>
<center>
    <fieldset>
        <legend>Login </legend>
        <form action="login.php" method="POST"><br><br>
            Username:<input type="text" required="" name="email"><br><br>
            Password:<input type="password" required="" name="password"><br><br>
            <input type="submit" value="Login" name="sub">
            <br>
            <?php
            if (isset($_REQUEST["err"]))
                $msg = "Invalid username or Password";
            ?>
            <p style="color:red;">
                <?php if (isset($msg)) {

                    echo $msg;
                }
                ?>

            </p>

        </form>

    </fieldset>
</center>

</html>