<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'php');

class DB_con{
    
    function __construct() {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "FAILED to connect to MySQL : " . mysqli_connect_errno();
        }
    }

    public function insert($name, $description,	$price,	$category_id, $created, $modified) {
        $result = mysqli_query($this->dbcon, "INSERT INTO products(name, description, price, 
        category_id, created, modified) VALUES('$name', '$description',	'$price', '$category_id', 
        '$created', '$modified')");
        return $result;
    }

    public function fetchadata() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM products");
        return $result;
    }

    public function fetchonerecord($id) {
        $result = mysqli_query($this->dbcon, "SELECT * FROM products WHERE id = '$id'");
        return $result;
    }

    public function update($name, $description, $price, $category_id, $created, $modified, $id) {
        $result = mysqli_query($this->dbcon, "UPDATE products SET 
            name = '$name',
            description = '$description',
            price = '$price',
            category_id = '$category_id',
            created = '$created',
            modified = '$modified'
            WHERE id = '$id'
        ");
        return $result;
    }

    public function delete($id) {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM products WHERE id = '$id'");
        return $deleterecord;
    }

}

?>