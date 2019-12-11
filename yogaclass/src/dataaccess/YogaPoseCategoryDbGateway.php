<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaPoseCategory;

require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';

class YogaPoseCategoryDbGateway {

    private $dbConnection;

    function __construct($persistenceUnitName) {
        $this->dbConnection = DataManager::connect($persistenceUnitName);
    }

    public function addYogaPoseCategory(YogaPoseCategory $yogaPoseCategory){
        $this->dbConnection->beginTransaction();
        try{
            $poseCategoryName = $yogaPoseCategory->getPoseCategoryName();

            $query = "INSERT INTO YOGA_POSE_CATEGORY 
                        (POSECATEGORYNAME, LASTUPDATED)
                      VALUES ('$poseCategoryName', NOW())";
            $this->dbConnection->query($query);
            $this->dbConnection->commit();
            return $this->dbConnection->lastInsertId();
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;


    }
    public function removeYogaPoseCategory($id){
        //if $id is associated with one or more poses, cannot be removed

    }
    public function getAllYogaPoseCategory(){

    }
}