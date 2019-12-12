<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaPose;

class YogaPoseDbGateway{
    private $dbConnection;

    function __construct($persistenceUnitName) {
        $this->dbConnection = DataManager::connect($persistenceUnitName);
    }

    public function addYogaPose(YogaPose $yogaPose){
        $this->dbConnection->beginTransaction();
        try{
            $imagePath = $yogaPose->getImagePath();
            $poseName = $yogaPose->getPoseName();
            $poseDescription = $yogaPose->getPoseDescription();

            $categories = $yogaPose->getCategories();

            $query = "INSERT INTO YOGA_POSE 
                        (IMAGEPATH, POSENAME, POSEDESCRIPTION, LASTUPDATED)
                      VALUES ('$imagePath', '$poseName', '$poseDescription', NOW())";
            $this->dbConnection->query($query);
            $lastInsertId = $this->dbConnection->lastInsertId();
            try {
                $this->associatePoseAndCategories($lastInsertId, $categories);
            }catch (\PDOException $exception){
                echo 'Exception -> ';
                var_dump($exception->getMessage());
                $this->dbConnection->rollBack();
                exit($exception->getMessage());
            }
            $this->dbConnection->commit();
            return $lastInsertId;
        } catch(PDOException $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());

        } throw $exception;
    }
    public function removeYogaPose($yogaPose){
        //check for associations in other tables

    }
    private function associatePoseAndCategories($lastInsertId, $categories){
        try {
            foreach ($categories as $category) {
                $query = "INSERT IGNORE INTO YOGA_POSE_CATEGORIES
                            (YOGA_POSE_ID, POSE_CATEGORY_NAME)
                          VALUES ('$lastInsertId', '$category')";
                $this->dbConnection->query($query);
                $lastInsertId = $this->dbConnection->lastInsertId();
                return $lastInsertId;
            }
        } catch(PDOException $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
}