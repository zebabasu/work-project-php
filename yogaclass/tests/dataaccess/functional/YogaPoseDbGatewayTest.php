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
class YogaPoseDbGatewayTest extends TestCase{
    private $lastInsertId;
    public function testAddYogaPose(){
        $yogaPose = new YogaPose("c:/yoga-image-path/camelpose.jpg", "Camel Pose", "uses core strength", array("sitting-backbend", "sitting"));
        $dbGateway = new YogaPoseDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $this->lastInsertId = $dbGateway->addYogaPose($yogaPose);
        $this->assertNotNull($this->lastInsertId);
    }

    protected function tearDown(): void
    {
        $dbGateway = new YogaPoseDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $countRowsDeleted = $dbGateway->removeYogaPose($this->lastInsertId);
        $this->assertEquals(1, $countRowsDeleted);
    }
}

