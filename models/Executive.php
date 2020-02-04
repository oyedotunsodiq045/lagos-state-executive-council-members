<?php 
  class Executive {
    // DB stuff
    private $conn;
    private $table = 'executives';

    // Executive Properties
    public $id;
    public $title;
    public $full_name;
    public $portfolio;
    public $email;
    public $contact;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Executives
    public function read() {
      // Create query
      $query = 'SELECT *
                FROM ' . $this->table . '
                ORDER BY created_at 
                DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Execute query
      $stmt->execute();
      
      return $stmt;
    }    

    // Get Single Executive
    public function read_single() {
      // Create query
        $query = 'SELECT * 
                  FROM ' . $this->table . ' 
                  WHERE id = ?';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set Properties
      $this->title = $row['title'];
      $this->full_name = $row['full_name'];
      $this->portfolio = $row['portfolio'];
      $this->email = $row['email'];
      $this->contact = $row['contact'];
    }

    // Search Executive
    public function search($keywords) {
      // Create query
      $query = 'SELECT * 
                FROM ' . $this->table . ' 
                WHERE full_name LIKE ? 
                OR email LIKE ? 
                OR contact LIKE ? 
                ORDER BY created_at 
                DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $keywords = htmlspecialchars(strip_tags($keywords));
      $keywords = "%{$keywords}%";

      // Bind data
      $stmt->bindParam(1, $keywords);
      $stmt->bindParam(2, $keywords);
      $stmt->bindParam(3, $keywords);

      // Execute query
      $stmt->execute();
         
      return $stmt;

    }

    /**
     * Paging Executive
     * @param - $from_data_num
     * @param - $datas_per_page
     */
    public function read_paging($from_data_num, $datas_per_page) {
 
      // select query
      $query = "SELECT * 
                FROM " . $this->table . " 
                ORDER BY created_at 
                DESC 
                LIMIT ?, ?";
    
      // prepare query statement
      $stmt = $this->conn->prepare( $query );
    
      // bind variable values
      $stmt->bindParam(1, $from_data_num, PDO::PARAM_INT);
      $stmt->bindParam(2, $datas_per_page, PDO::PARAM_INT);
    
      // execute query
      $stmt->execute();
    
      // return values from database
      return $stmt;
    }

    /**
     * Paging Executive 
     * count method
     */
    public function count() {
      $query = "SELECT COUNT(*) as total_rows 
                FROM " . $this->table . "";
   
      // prepare query statement
      $stmt = $this->conn->prepare($query);
      // execute query
      $stmt->execute();
      // retrieve our table contents
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
      return $row['total_rows'];
    }
    
  }