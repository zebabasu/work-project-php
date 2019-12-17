<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaPose;

class YogaPoseDbGateway{
    private $dataManager;

    function __construct($persistenceUnitName) {
        $this->dataManager = new DataManager($persistenceUnitName);
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
                $lastInsertId = $this->associatePoseAndCategories($lastInsertId, $categories);

            }catch (\PDOException $exception){
                echo 'Exception -> ';
                var_dump($exception->getMessage());
                $this->dataManager->rollBack();
                $this->dataManager->commit();
                exit($exception->getMessage());
            }
            $this->dataManager->commit();
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
                $this->dataManager->insertNoCommit($query);
                return $this->dataManager->lastInsertId();
            }
        } catch(PDOException $exception){
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
}