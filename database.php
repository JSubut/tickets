<?php
class DB {
    // (A) CONNECT TO DATABASE
    public $error = "";
    private $pdo = null;
    private $stmt = null;
    function __construct () {
        try {
            $this->pdo = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
                DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (Exception $ex) { exit($ex->getMessage()); }
    }

    // (B) CLOSE CONNECTION
    function __destruct(){
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
    }

    // (C) RUN A SELECT QUERY
    function select($sql, $cond=null){
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();
            return $result;
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }
}

// (D) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "tickets");
define("DB_CHARSET", "UTF8MB4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

$servername = "localhost";
$username = "root";
$password = "";
$db= "tickets";
$dbcharset = "UTF8MB4";

$conn = mysqli_connect($servername, $username, $password,$db);

$pdo = new PDO(
    "mysql:host=".$servername.";dbname=".$db.";charset=".$dbcharset,
    $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
