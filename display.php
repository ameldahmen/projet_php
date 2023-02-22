<?php
include 'database.php';

$db= new DatabaseClass();

$users= $db->select();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="insert.php" class="text-light">Add user</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S1 no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     foreach ( $users as $user)
                     {
                            echo '<tr>
                                    <th scope="row">' . $user['id'] . '</th>
                                    <td>' .  $user['name'] . '</td>
                                    <td>' .  $user['email'] . '</td>
                                    <td>' . $user['mobile'] . '</td>
                                    <td>' . $user['password'] . '</td>
                                    <td>
                                        <button class="btn btn-primary"><a href="update.php?updateid='.$user['id'].'" class="text-light">Update</a></button>
                                        <button class="btn btn-primary"><a href="delete.php?deleteid='.$user['id'].'" class="text-light">Delete</a></button>
                                    </td>
                                </tr>';
                        }   
                    
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>