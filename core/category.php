<?php
  class Category{
    //db stuff
    private $conn;
    private $table = 'categories';

    //category propreties
    public $id;
    public $name;
    public $created_at;

    //constructor with db connection
    public function __construct($db){
      $this->conn = $db;
    }

    //getting categorys from our database
    public function read(){
      //create query
      $query = 'SELECT * FROM '.$this->table;
      
      //prepare statement
      $stmt = $this->conn->prepare($query);

      //execute statement
      $stmt->execute();

      return $stmt;
    }

    //getting single category from our database
    public function read_single(){
      //create query
      $query = 'SELECT * FROM '.$this->table.' WHERE id = :id LIMIT 1';
      
      //prepare statement
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1, $this->id);
      //execute statement
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->name = $row['name'];
      $this->created_at = $row['created_at'];

      return $stmt;
    }

    //create record category to our database
    public function create(){
      //create query
      $query = 'INSERT INTO '.$this->table.' SET name = :name';
      
      //prepare statement
      $stmt = $this->conn->prepare($query);

      //clean data
      $this->name = htmlspecialchars(strip_tags($this->name));

      //binding of parameters
      $stmt->bindParam(':name', $this->name);

      //execute statement
      if ($stmt->execute()) {
        return true;
      }
      //print error if something goes wrong
      printf("Error %s. \n", $stmt->error);
      return false;
    }

    //update record category on our database
    public function update(){
      //create query
      $query = 'UPDATE '.$this->table.' SET name = :name
        WHERE id = :id';
      
      //prepare statement
      $stmt = $this->conn->prepare($query);

      //clean data
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->id = htmlspecialchars(strip_tags($this->id));

      //binding of parameters
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':id', $this->id);

      //execute statement
      if ($stmt->execute()) {
        return true;
      }
      //print error if something goes wrong
      printf("Error %s. \n", $stmt->error);
      return false;
    }

    //delete record category on our database
    public function delete(){
      //create query
      $query = 'DELETE FROM '.$this->table.' WHERE id = :id';
      
      //prepare statement
      $stmt = $this->conn->prepare($query);

      //clean the data
      $this->id = htmlspecialchars(strip_tags($this->id));

      //binding of parameter id
      $stmt->bindParam(':id', $this->id);

      //execute statement
      if ($stmt->execute()) {
        return true;
      }
      //print error if something goes wrong
      printf("Error %s. \n", $stmt->error);
      return false;
    }
  }
?>
