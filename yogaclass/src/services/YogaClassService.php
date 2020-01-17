<?php


namespace yogaclass\src\services;


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\dataaccess\YogaClassDbGateway;

class YogaClassService {
    private $dbGateway;
    public function __construct(){
        $this->dbGateway = new YogaClassDbGateway();
    }
    public function createYogaClass($className, $publicShared, YogaTeacher $yogateacher){
        $yogaClass = YogaClass($className, $publicShared, $yogateacher);
        $this->dbGateway->addYogaClass($yogaClass);
    }
    public function getAllYogaClasses(){
        $listYogaClass = $this->dbGateway->getAllYogaClasses();
        return $listYogaClass;
    }
    public function getYogaClassDetails($id){
        $this->dbGateway->getYogaClassDetails($id);
    }
    public function removeYogaClass($id){
        $this->dbGateway->removeYogaClass($id);
    }

}