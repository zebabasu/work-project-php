<?php


namespace yogaclass\src\dataaccess;
use yogaclass\src\dataaccess\DataManager;

class YogaClassDbGateway {
    private $dbConnection;

    function __construct() {
        $dbConnection = new DataManager();
    }

    public function addYogaClass(){

    }
}