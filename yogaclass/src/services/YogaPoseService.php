<?php

namespace yogaclass\src\services;


use yogaclass\src\dataaccess\YogaPoseDbGateway;

class YogaPoseService {

    private $dbGateway;
    public function __construct(){
        $this->dbGateway = new YogaPoseDbGateway();
    }
    public function getAllYogaPoses(){
        $listYogaClass = $this->dbGateway->getYogaPoses();
        return $listYogaClass;
    }

}