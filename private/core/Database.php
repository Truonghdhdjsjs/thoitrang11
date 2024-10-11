<?php
class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $pdo;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        try {
            $this->pdo = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            // Log the error message instead of echoing it directly
           throw new Exception("Error Processing Request", 1);
           
        }
    }

    public function __destruct()
    {
        $this->pdo = null; // Close the connection
    }
}
$db = new Database(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
