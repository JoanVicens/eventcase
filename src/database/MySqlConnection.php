<?php

class MySqlConnection
{

    private $con;

    private string $database;
    private string $user;
    private string $password;

    function __construct(string $database, string $user, string $password)
    {
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->con = NULL;
    }

    public function connect()
    {
        try {
            $this->con = new PDO("mysql:host=db;port=3306;dbname={$this->database}", $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) { 
            return [false, $ex->getMessage()];
        }

        return [$this->con != NULL, NULL];
    }

    public function getConnector()
    {
        return $this->con;
    }

    public function closeConnection()
    {
        $this->con = NULL;
    }
}
