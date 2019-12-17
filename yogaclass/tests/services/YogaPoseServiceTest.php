<?php


use yogaclass\src\businessobjects\YogaPose;
use yogaclass\src\dataaccess\DataManager;
use yogaclass\src\dataaccess\YogaPoseDbGateway;
use PHPUnit\Framework\TestCase;

class YogaPoseServiceTest extends TestCase {

    public function testAddYogaPose(){
        $yogaPose = new YogaPose("c:/yoga-image-path/camelpose.jpg", "Camel Pose", "uses core strength", array("sitting-backbend", "sitting"));
        $dbGateway = new YogaPoseDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $dbGateway->addYogaPose($yogaPose);
    }
}
