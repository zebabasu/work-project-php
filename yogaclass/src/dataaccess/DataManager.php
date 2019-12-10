<?php


namespace yogaclass\src\dataaccess;
use PDO;
class DataManager {
    private const PERSISTENCE_UNIT_NAME = 'YogaPersistenceUnit';
    private $iniPath;
    function __construct() {
        $this->iniPath = realpath(__DIR__.'/../../config/config.ini');

    }

    public function connect() : PDO
    {
        try {

            $iniFile = parse_ini_file($this->iniPath, true);
            $url = $iniFile['YogaPersistenceUnit']['url'];
            $username = $iniFile['YogaPersistenceUnit']['username'];
            $password = $iniFile['YogaPersistenceUnit']['password'];
            //$connStr = "mysql:host={$dbInfo['host']};{$dbInfo['dbname']}";
            $conn = new PDO($url, $username, $password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $exception) {
            echo "error";
            exit($exception->getMessage());
        }
    }
}
