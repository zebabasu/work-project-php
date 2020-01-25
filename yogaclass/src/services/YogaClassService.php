<?php


namespace yogaclass\src\services;


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\dataaccess\YogaClassDbGateway;

class YogaClassService {
    private $dbGateway;
    public function __construct($dbGateway){
        $this->dbGateway = $dbGateway;
    }
    /*public function createYogaClass($className, $publicShared, YogaTeacher $yogateacher, array $poseIdList){
        $yogaClass = YogaClass($className, $publicShared, $yogateacher);
        $lastInsertId = $this->dbGateway->addYogaClass($yogaClass);
        $this->dbGateway->addYogaClassPoses($lastInsertId, $poseIdList);
    }*/
    public function createYogaClass($yogaClassJsonData){
        $yogaClass = YogaClass::createYogaClassFromJson($yogaClassJsonData);
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

}