<?php


namespace yogaclass\src\dataaccess;


use yogaclass\src\businessobjects\YogaClass;

class YogaClassDbGateway {

    private $dataManager;

    public function __construct($persistenceUnitName='YogaPersistenceUnit') {
        $this->dataManager = new DataManager($persistenceUnitName);
    }
    public function addYogaClass(YogaClass $yogaClass){
        try{
            $className = $yogaClass->getClassName();
            $publicShared = $yogaClass->getPublicShared();
            $teacherEmailId = $yogaClass->getYogaTeacherEmailId();
            $teacherName = $yogaClass->getYogaTeacherName();

            $query = "INSERT INTO YOGA_CLASS 
                        (CLASSNAME, PUBLICSHARED, YOGATEACHER_NAME, YOGATEACHER_EMAIL_ID, LASTUPDATED)
                      VALUES ('$className', '$publicShared', '$teacherName', '$teacherEmailId', NOW())";

            return $this->dataManager->execute($query);
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;


    }
    public function removeYogaClass($id){


    }
    public function getAllYogaClasses(){
        //SELECT CLASSNAME, YOGATEACHER_NAME, YOGATEACHER_EMAIL_ID, PUBLICSHARED FROM YOGA_CLASS
        try{

            $query = "SELECT CLASSNAME, YOGATEACHER_NAME, YOGATEACHER_EMAIL_ID, PUBLICSHARED FROM YOGA_CLASS";
            return $this->dataManager->fetchAll($query);

        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }


}