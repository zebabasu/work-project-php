<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaPose;

class YogaPoseDbGateway{
    private $dataManager;

    function __construct($persistenceUnitName='YogaPersistenceUnit') {
        $this->dataManager = new DataManager($persistenceUnitName);
    }
    public function getYogaPoses(){

        try{
            $query = "SELECT ID, IMAGEPATH, LASTUPDATED, POSEDESCRIPTION, POSENAME FROM YOGA_POSE";
            return $this->dataManager->fetchAll($query);

        } catch(Exception $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
    public function addYogaPose(YogaPose $yogaPose){
        try{
            $imagePath = $yogaPose->getImagePath();
            $poseName = $yogaPose->getPoseName();
            $poseDescription = $yogaPose->getPoseDescription();

            $categories = $yogaPose->getCategories();

            $query = "INSERT INTO YOGA_POSE 
                        (IMAGEPATH, POSENAME, POSEDESCRIPTION, LASTUPDATED)
                      VALUES ('$imagePath', '$poseName', '$poseDescription', NOW())";
            $this->dataManager->beginTransaction();
            $this->dataManager->insertNoCommit($query);
            $lastInsertId = $this->dataManager->lastInsertId();
            try {
                $this->associatePoseAndCategories($lastInsertId, $categories);
                $this->dataManager->commit();
                return $lastInsertId;
            }catch (\PDOException $exception){
                $this->dataManager->rollBack();
                //$this->dataManager->commit();
            } throw $exception;
        } catch(PDOException $exception){

       } throw $exception;
    }
    public function removeYogaPose($yogaPoseId){
        try {
            $query1 = "DELETE FROM YOGA_POSE_CATEGORIES
                 WHERE YOGA_POSE_ID = '$yogaPoseId'";
            $this->dataManager->deleteNoCommit($query1);
            try {
                $query2 = "DELETE FROM YOGA_POSE
                 WHERE ID = '$yogaPoseId'";
                $rowCount = $this->dataManager->deleteNoCommit($query2);
                $this->dataManager->commit();
                return $rowCount;
            } catch (\PDOException $exception){
                echo 'Exception -> ';
                var_dump($exception->getMessage());
                $this->dataManager->rollBack();
                $this->dataManager->commit();
            } throw $exception;

        } catch(PDOException $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());

        } throw $exception;

    }
    private function associatePoseAndCategories($lastInsertId, $categories){
        try {
            foreach ($categories as $category) {
                $query = "INSERT IGNORE INTO YOGA_POSE_CATEGORIES
                            (YOGA_POSE_ID, POSE_CATEGORY_NAME)
                          VALUES ('$lastInsertId', '$category')";
                $this->dataManager->insertNoCommit($query);
                return $this->dataManager->lastInsertId();
            }
        } catch(PDOException $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }

}