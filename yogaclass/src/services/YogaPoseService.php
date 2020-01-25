<?php

namespace yogaclass\src\services;


use yogaclass\src\dataaccess\YogaPoseDbGateway;

class YogaPoseService {

    private $dbGateway;
    public function __construct($dbGateway){
        $this->dbGateway = $dbGateway;
    }
    public function getAllYogaPoses(){
        $listYogaClass = $this->dbGateway->getYogaPoses();
        return $listYogaClass;
    }

}