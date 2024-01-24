<?php
class Database
{
    private $host;
    private $username;
    private $password;
    private $dbName;
    private $conn;

    // Constructor to initialize database credentials
    public function __construct($host, $username, $password, $dbName)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    // Method to establish database connection
    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }


    // Method to close database connection
    public function close()
    {
        $this->conn->close();
    }
}

// Usage example:
$database = new Database('localhost', 'root', '', 'uthmsync');
$connection = $database->connect();

// Perform database operations using $connection

// Close the connection when done (optional)
$database->close();
?>