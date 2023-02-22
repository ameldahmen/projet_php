<?php
include 'database.php';

if (isset($_POST['submit'])) {
    $db = new DatabaseClass();
    $db->Insert($_POST);
    header('Location: display.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Crud operation</title>
  </head>
  <body>
  <div class="container">
        <h1 class="my-5">Add User</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
  
   <a href="display.php" >My List</a>

    
  </body>
</html>