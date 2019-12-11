<?php


use PHPUnit\Framework\TestCase;
use yogaclass\src\businessobjects\YogaPose;
use \yogaclass\src\dataaccess\DataManager;
use \yogaclass\src\dataaccess\YogaPoseDbGateway;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaPose.php';
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'YogaPoseDbGateway.php';
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';

/**
 * Class YogaPoseDbGatewayTest
 * these aren't true unit tests, as they require a database connection
 */
class YogaPoseDbGatewayTest {

    public static function testAddYogaPose(){
        $yogaPose = new YogaPose("c:/yoga-image-path/camelpose.jpg", "Camel Pose", "uses core strength", array("sitting-backbend", "sitting"));
        $dbGateway = new YogaPoseDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $dbGateway->addYogaPose($yogaPose);
    }

}
YogaPoseDbGatewayTest::testAddYogaPose();
