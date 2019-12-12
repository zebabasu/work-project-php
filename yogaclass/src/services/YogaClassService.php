<?php


namespace yogaclass\src\services;


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\dataaccess\YogaClassDbGateway;

class YogaClassService {
    private $dbGateway;

    /**
     * YogaClassService constructor.
     */
    public function __construct() {
        $this->dbGateway = new YogaClassDbGateway();
    }

    public function createYogaClass($className, $publicShared, YogaTeacher $yogateacher){
        $yogaClass = YogaClass($className, $publicShared, $yogateacher);
        $this->dbGateway->addYogaClass($yogaClass);
    }
    public function getAllYogaClasses(){

    }
}