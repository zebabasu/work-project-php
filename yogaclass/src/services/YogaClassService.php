<?php


namespace yogaclass\src\services;
use yogaclass\src\commons\JsonToClassConverter;

class YogaClassService {
    private $dbGateway;
    private $jsonConverter;
    public function __construct($dbGateway, $jsonConverter=null){
        if(!isset($jsonConverter)){
            $this->jsonConverter=new JsonToClassConverter();
        }
        else{
            $this->jsonConverter = $jsonConverter;
        }
        $this->dbGateway = $dbGateway;

    }

    public function createYogaClass($yogaClassJsonData){
        $yogaClass = $this->jsonConverter->createYogaClassFromJson($yogaClassJsonData);
        $lastInsertId = $this->dbGateway->addYogaClass($yogaClass);
        return $lastInsertId;
    }
    public function getAllYogaClasses(){
        $listYogaClass = $this->dbGateway->getAllYogaClasses();
        return $listYogaClass;
    }
    public function getYogaClassDetails($id){
        return $this->dbGateway->getYogaClassDetails($id);
    }
    public function removeYogaClass($id){
        $this->dbGateway->removeYogaClass($id);
    }
    public function updateYogaClass($updatedYogaClassData){
        $updatedYogaClass = $this->jsonConverter->createYogaClassFromJson($updatedYogaClassData);
        $this->dbGateway->updateYogaClass($updatedYogaClass);
    }
}