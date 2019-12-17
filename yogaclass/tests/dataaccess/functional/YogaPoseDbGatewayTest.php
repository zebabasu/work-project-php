<?php
namespace yogaclass\tests\dataaccess\functional;

use PHPUnit\Framework\TestCase;
use yogaclass\src\businessobjects\YogaPose;
use \yogaclass\src\dataaccess\DataManager;
use \yogaclass\src\dataaccess\YogaPoseDbGateway;

/**
 * Class YogaPoseDbGatewayTest
 * these aren't true unit tests, as they require a database connection in yogaclass/config/config.ini
 * //TODO need a simulation of setup and teardown here
 */
class YogaPoseDbGatewayTest {

    public static function testAddYogaPose(){
        $yogaPose = new YogaPose("c:/yoga-image-path/camelpose.jpg", "Camel Pose", "uses core strength", array("sitting-backbend", "sitting"));
        $dbGateway = new YogaPoseDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $dbGateway->addYogaPose($yogaPose);
    }
}
YogaPoseDbGatewayTest::testAddYogaPose();
