<?php
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "books";
  
    // object properties
    public $id;
    public $name;
    public $author;
    public $created_at;
    public $updated_at;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read books
    function read(){
    
        // select all query
        $query = "SELECT * FROM books";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    function readOne(){
  
        $query = "SELECT * FROM books WHERE id = ? LIMIT 0,1";
      
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
      
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
      
        // execute query
        $stmt->execute();
      
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        // set values to object properties
        $this->name = $row['name'];
        $this->created_at = $row['created_at'];
        $this->author = $row['author'];
        $this->updated_at = $row['updated_at'];
        // $this->category_name = $row['category_name'];
    }

    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    author = :author
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->author=htmlspecialchars(strip_tags($this->author));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // search books
    function search($keywords){
    
        // select all query
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.author, p.created_at, p.updated_at, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.updated_at = c.id
                WHERE
                    p.name LIKE ? OR p.author LIKE ? OR c.name LIKE ?
                ORDER BY
                    p.created DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // read books with pagination
    public function readPaging($from_record_num, $records_per_page){
    
        // select query
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.author, p.created_at, p.updated_at, p.created
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.updated_at = c.id
                ORDER BY p.created DESC
                LIMIT ?, ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // return values from database
        return $stmt;
    }
    // used for paging books
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }
    // create product
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, author=:author";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->author=htmlspecialchars(strip_tags($this->author));

    
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":author", $this->author);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
      
}

}
?>