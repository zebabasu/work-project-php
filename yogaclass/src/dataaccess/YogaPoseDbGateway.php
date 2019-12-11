<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\dataaccess\DataManager;

class YogaPoseDbGateway{
    private $dbConnection;

    function __construct() {
        $this->dbConnection = DataManager::connect(DataManager::PERSISTENCE_UNIT_NAME);
    }

    public function addYogaPose($yogaPose){
        try{
            $poseCategoryName = $yogaPose->getPoseCategoryName();

            $query = "INSERT INTO YOGA_POSE_CATEGORY 
                        (POSECATEGORYNAME, LASTUPDATED)
                      VALUES ('$poseCategoryName', NOW())";
            $this->dbConnection->query($query);
            return $this->dbConnection->lastInsertId();
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
    public function removeYogaPose($yogaPose){
        //check for associations in other tables

    }
}