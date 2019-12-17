<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaTeacher;

class YogaTeacherDbGateway {

    private $dataManager;

    public function __construct($persistenceUnitName='YogaPersistenceUnit') {
        $this->dataManager = new DataManager($persistenceUnitName);
    }
    public function addYogaTeacher(YogaTeacher $yogaTeacher ){
        try{
            $teacherName = $yogaTeacher->getTeacherName();
            $emailId = $yogaTeacher->getEmailId();
            $query = "INSERT INTO YOGA_TEACHER 
                        (TEACHERNAME, EMAILID, LASTUPDATED)
                        VALUES ('$teacherName', '$emailId', NOW())";
            return $this->dataManager->insertWithCommit($query);
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
    public function getAllYogaTeachers(){
        try{
            $query = "SELECT TEACHERNAME, EMAILID FROM YOGA_TEACHER";
            return $this->dataManager->fetchAll($query);

        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
}