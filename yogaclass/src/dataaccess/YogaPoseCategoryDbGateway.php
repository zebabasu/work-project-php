<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaPoseCategory;

require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';

class YogaPoseCategoryDbGateway {

    private $dbConnection;

    function __construct() {
        $this->dbConnection = DataManager::connect(DataManager::PERSISTENCE_UNIT_NAME);
    }

    public function addYogaPoseCategory(YogaPoseCategory $yogaPoseCategory){
        try{
            $poseCategoryName = $yogaPoseCategory->getPoseCategoryName();

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
    public function removeYogaPoseCategory($id){
        //if $id is associated with one or more poses, cannot be removed

    }
    public function getAllYogaPoseCategory(){

    }
}