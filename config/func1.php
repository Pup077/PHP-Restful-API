<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'php');

class DB_dog{
    
    function __construct() {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbdog = $conn;

        if (mysqli_connect_errno()) {
            echo "FAILED to connect to MySQL : " . mysqli_connect_errno();
        }
    }

    public function insert($name, $description, $created, $modified) {
        $result = mysqli_query($this->dbdog, "INSERT INTO categories(name, description, price, 
        category_id, created, modified) VALUES('$name', '$description', '$created', '$modified')");
        return $result;
    }

    public function fetchadata() {
        $result = mysqli_query($this->dbdog, "SELECT * FROM categories");
        return $result;
    }

    public function fetchonerecord($id) {
        $result = mysqli_query($this->dbdog, "SELECT * FROM categories WHERE id = '$id'");
        return $result;
    }

    public function update($name, $description, $created, $modified, $id) {
        $result = mysqli_query($this->dbdog, "UPDATE categories SET 
            name = '$name',
            description = '$description',
            created = '$created',
            modified = '$modified'
            WHERE id = '$id'
        ");
        return $result;
    }

    public function delete($id) {
        $deleterecord = mysqli_query($this->dbdog, "DELETE FROM categories WHERE id = '$id'");
        return $deleterecord;
    }

}

?>