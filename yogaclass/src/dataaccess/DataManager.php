<?php


namespace yogaclass\src\dataaccess;
use PDO;
use yogaclass\src\commons\ConfigIniAccess;
class DataManager {
    public const PERSISTENCE_UNIT_NAME = 'YogaPersistenceUnit';
    private $connectionInfo;

    public function __construct($persistenceUnitName){
        $this->connectionInfo = DataManager::connect($persistenceUnitName);
    }
    public static function connect($persistenceUnitName) : PDO
    {
        $iniConnectionData = ConfigIniAccess::getConfigSection($persistenceUnitName);
        try {
            $url = $iniConnectionData['url'];

            $username = $iniConnectionData['username'];
            $password = $iniConnectionData['password'];

            $conn = new PDO($url, $username, $password);
          // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $exception) {
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
    public function insertWithCommit($query){
        $this->connectionInfo->beginTransaction();
        $statement = $this->connectionInfo->prepare($query);
        $statement->execute();
        $lastInsertId = $this->connectionInfo->lastInsertId();
        $this->connectionInfo->commit();
        return $lastInsertId;
    }
    public function deleteWithCommit($query){
        $this->connectionInfo->beginTransaction();
        $statement = $this->connectionInfo->prepare($query);
        $statement->execute();
        $rowCount =  $statement->rowCount();
        $this->connectionInfo->commit();

       return $rowCount;
    }
    public function insertNoCommit($query){
       // $this->connectionInfo->beginTransaction();
        $statement = $this->connectionInfo->prepare($query);
        $statement->execute();
        return $this->connectionInfo->lastInsertId();
    }
    public function deleteNoCommit($query){
       // $this->connectionInfo->beginTransaction();
        $statement = $this->connectionInfo->prepare($query);
        $statement->execute();
        $rowCount =  $statement->rowCount();
        return $rowCount;
    }
    public function commit(){
        $this->connectionInfo->commit();
    }
    public function rollback(){
        $this->connectionInfo->rollBack();
    }
    public function lastInsertId(){
        return $this->connectionInfo->lastInsertId();
    }
    public function fetchAll($query){
        $this->connectionInfo->beginTransaction();
        $statement = $this->connectionInfo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }
    public function getAttribute($attr){
       return $this->connectionInfo->getAttribute($attr);
    }
    public function beginTransaction(){
        $this->connectionInfo->beginTransaction();
    }
}
