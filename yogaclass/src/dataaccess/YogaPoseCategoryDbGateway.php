<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\businessobjects\YogaPoseCategory;

class YogaPoseCategoryDbGateway {

    private $dataManager;

    function __construct($persistenceUnitName) {
        $this->dataManager = new DataManager($persistenceUnitName);
    }

    public function addYogaPoseCategory(YogaPoseCategory $yogaPoseCategory){

        try{
            $poseCategoryName = $yogaPoseCategory->getPoseCategoryName();

            $query = "INSERT INTO YOGA_POSE_CATEGORY 
                        (POSECATEGORYNAME, LASTUPDATED)
                      VALUES ('$poseCategoryName', NOW())";
            return $this->dataManager->insertWithCommit($query);
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