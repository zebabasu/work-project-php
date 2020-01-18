<?php


namespace yogaclass\src\services;


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\dataaccess\YogaClassDbGateway;

class YogaClassService {
    private $dbGateway;
    public function __construct(){
        $this->dbGateway = new YogaClassDbGateway();
    }
    public function createYogaClass($className, $publicShared, YogaTeacher $yogateacher, array $poseIdList){
        $yogaClass = YogaClass($className, $publicShared, $yogateacher);
        $lastInsertId = $this->dbGateway->addYogaClass($yogaClass);
        $this->dbGateway->addPosesToYogaClass($lastInsertId, $poseIdList);
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