<?php

namespace yogaclass\tests\dataaccess\functional;

use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\dataaccess\DataManager;
use PHPUnit\Framework\TestCase;
/**
 * Class YogaClassDbGatewayTest
 * @package yogaclass\tests\dataaccess\functional
 * these aren't true unit tests as they need a database connection in yogaclass/config/config.ini
 */
class YogaClassDbGatewayTest extends TestCase{

    private $lastInsertId;
    private $lastInsertId2;
    protected function setUp(){

        $yogaTeacher = new YogaTeacher();
        $yogaClass = new YogaClass("Slow Vinyasa Flow Test", 1, $yogaTeacher);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $this->lastInsertId= $dbGateway->addYogaClass($yogaClass);
        $this->assertNotNull($this->lastInsertId);

        $yogaClass = new YogaClass("Slow Vinyasa Flow Test-2", 1, $yogaTeacher);
        $poseList1 = [17, 18];
        $yogaClass->setPoseIdList($poseList1);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $this->lastInsertId2= $dbGateway->addYogaClass($yogaClass);
        $this->assertNotNull($this->lastInsertId2);

    }
    public function testGetYogaClassDetails(){
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $yogaClass = $dbGateway->getYogaClassDetails($this->lastInsertId);
        $this->assertEquals("Slow Vinyasa Flow Test", $yogaClass[0]['CLASSNAME']);

        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $yogaClass2 = $dbGateway->getYogaClassDetails($this->lastInsertId2);
        $this->assertEquals("Slow Vinyasa Flow Test-2", $yogaClass2[0]['CLASSNAME']);
        $this->assertEquals(2, count($yogaClass2));
    }

    protected function tearDown(): void
    {
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $countRowsDeleted = $dbGateway->removeYogaClass($this->lastInsertId);
        $this->assertEquals(1, $countRowsDeleted);

        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $countRowsDeleted = $dbGateway->removeYogaClass($this->lastInsertId2);
        $this->assertEquals(1, $countRowsDeleted);
    }

}

