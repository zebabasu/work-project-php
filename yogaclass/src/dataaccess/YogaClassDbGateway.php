<?php


namespace yogaclass\src\dataaccess;


use yogaclass\src\businessobjects\YogaClass;

class YogaClassDbGateway {

    private $dbConnection;

    function __construct($persistenceUnitName) {
        $this->dbConnection = DataManager::connect($persistenceUnitName);
    }
    public function addYogaClass(YogaClass $yogaClass){
        $this->dbConnection->beginTransaction();
        try{
            $className = $yogaClass->getClassName();
            $publicShared = $yogaClass->getPublicShared();
            $teacherEmailId = $yogaClass->getYogaTeacherEmailId();
            $teacherName = $yogaClass->getYogaTeacherName();

            $query = "INSERT INTO YOGA_CLASS 
                        (CLASSNAME, PUBLICSHARED, YOGATEACHER_NAME, YOGATEACHER_EMAIL_ID, LASTUPDATED)
                      VALUES ('$className', '$publicShared', '$teacherName', '$teacherEmailId', NOW())";
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