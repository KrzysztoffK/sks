<?php 
class Connection {
    private static $host = "127.0.0.1";
    private static $password = "";
    private static $database = "sks";
    private static $charset = "utf8";
    private static $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    private $username;
    private $connection;

    public function __construct($username){
        $this->username = $username;
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$database . ";charset=" . self::$charset;
        try {
            $this->connection = new PDO($dsn, $username, self::$password, self::$options);
            #echo "User $username connected succesfully<br />";
        } catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }
    }

    public function getPDO(){
        return $this->connection;
    }
    
    public function close(){
        try {
            $this->connection = null;
            #echo "User $this->username disconnected succesfully<br />";
        } catch (PDOException $e) {
            echo "Failed to close the connection: ". $e->getMessage();
        }
    }
}
?>