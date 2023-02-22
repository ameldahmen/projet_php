<?php

include 'database.php';

$db = new DatabaseClass();

if(isset($_POST['update'])){
    $id = $_GET['updateid'];
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'mobile' => $_POST['mobile'],
        'password' => $_POST['password']
    );
    $db->Update($id, $data);
    
}

if(isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $user = $db->getUser($id);
} else {
    header('Location: display.php');
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Update User</title>
</head>
<body>
    <div class="container">
        <h1>Update User</h1>
        <form action="update.php?updateid=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="username">Name:</label>
                <input type="text" class="form-control" id="username" name="name" value="<?php echo $user[0]['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user[0]['email']; ?>">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $user[0]['mobile']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $user[0]['password']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>