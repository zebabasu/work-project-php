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

            $lastInsertId = $this->dataManager->insertWithCommit($query);

            $poseIdList = $yogaClass->getPoseIdList();
            if(isset($poseIdList)) {
                foreach ($poseIdList as $poseId) {
                    $query2 = "INSERT INTO YOGA_CLASS_POSES 
                                (YOGA_CLASS_ID, YOGA_POSE_ID)
                                VALUES ('$lastInsertId', '$poseId')";
                    $this->dataManager->insertWithCommit($query2);
                }
            }
            return $lastInsertId;
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;


    }
    public function removeYogaClass($id){
        try {
            $query = "DELETE FROM YOGA_CLASS_POSES 
                        WHERE YOGA_CLASS_ID = '$id' ";
            $this->dataManager->deleteWithCommit($query);
            $query2 = "DELETE FROM YOGA_CLASS
                 WHERE ID = '$id'";

            return $this->dataManager->deleteWithCommit($query2);
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;

    }
    /*public function getYogaClassDetails($id){
        try {
            $query = "SELECT * FROM YOGA_CLASS
                 WHERE ID = '$id'";
            return $this->dataManager->fetchAll($query);

        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;

    }*/
    public function getYogaClassDetails($id){
        try {
            $query = "SELECT C.ID, C.CLASSNAME, C.YOGATEACHER_NAME, C.YOGATEACHER_EMAIL_ID, C.PUBLICSHARED , CP.YOGA_POSE_ID, P.POSENAME, P.IMAGEPATH FROM YOGA_CLASS AS C
                        LEFT  JOIN(YOGA_CLASS_POSES AS CP CROSS JOIN YOGA_POSE AS P ) ON (C.ID=CP.YOGA_CLASS_ID AND CP.YOGA_POSE_ID = P.ID )
                        WHERE C.ID='$id' ";
            return $this->dataManager->fetchAll($query);

        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;

    }
    public function getAllYogaClasses(){
       try{
           $query = "SELECT ID, CLASSNAME, YOGATEACHER_NAME, YOGATEACHER_EMAIL_ID, PUBLICSHARED FROM YOGA_CLASS";
            return $this->dataManager->fetchAll($query);

        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
    public function addYogaClassPose($yogaClassId, $poseId){
        try{
                $query = "INSERT INTO YOGA_CLASS_POSES 
                        (YOGA_CLASS_ID, YOGA_POSE_ID)
                      VALUES ('$yogaClassId', '$poseId')";

            return $this->dataManager->insertWithCommit($query);
        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
    public function addYogaClassPoses($yogaClassId, array $poseIdList){
        foreach ($poseIdList as $poseId) {
            try{
                $query = "INSERT INTO YOGA_CLASS_POSES 
                        (YOGA_CLASS_ID, YOGA_POSE_ID)
                      VALUES ('$yogaClassId', '$poseId')";

                return $this->dataManager->insertWithCommit($query);
            } catch(Exception $exception){
                echo 'Exception -> ';
                var_dump($exception->getMessage());
            } throw $exception;
        }
    }
    public function updateYogaClass($updatedYogaClass){

    }
}