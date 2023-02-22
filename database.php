<?php
class DatabaseClass
{

    private $connection = null;
    // $dbhost = "localhost";
    // $dbname = "myDataBaseName";
    // $username = "root";
    // $password    = "" ;
    // this function is called everytime this class is instantiated

    public function __construct($dbhost = "localhost", $dbname = "crudoperation", $username = "root", $password = "")
    {
        try {
            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            //$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Insert($data)
    {
        if (isset($data['name']) && isset($data['email']) && isset($data['mobile']) && isset($data['password'])) {
            $name = $data['name'];
            $email = $data['email'];
            $mobile = $data['mobile'];
            $password = $data['password'];

            try {
                $sql = "INSERT INTO `crud` (`name`, `email`, `mobile`, `password`) VALUES ('$name', '$email', '$mobile', '$password')";
                $this->connection->exec($sql);
                echo "New record created successfully";
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    }

    public function Select()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM crud ORDER BY id ASC");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Update($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $password = $data['password'];

        try {
            $sql = "UPDATE `crud` SET `name` = '$name', `email` = '$email', `mobile`='$mobile', `password`='$password' WHERE `id` = $id";
            $stmt = $this->connection->exec($sql);
            if ($stmt == 0) {
                echo "record(s) updated successfully with id = $id";
            } else {
                echo " $stmt No record found";
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function getUser($id)
    {
        $stmt =  $this->connection->prepare("SELECT * FROM crud where id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->fetchAll();

        return $result;
    }

    // Remove a row/s in a Database Table

    public function Remove($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM crud WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo "Error deleting record: " . $e->getMessage();
        }
    }


    // execute statement
    private function executeStatement($sql, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    function login($data )
    {
        $email = $data['email'];
        $password = $data['password'];

 
            $stmt = $this->connection->prepare("SELECT * FROM crud where password=$password and email = $email ");
            $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->fetchAll();

        return $result;
    }
}
