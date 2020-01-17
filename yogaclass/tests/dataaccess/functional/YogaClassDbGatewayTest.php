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
    protected function setUp(){

        $yogaTeacher = new YogaTeacher();
        $yogaClass = new YogaClass("Slow Vinyasa Flow", 1, $yogaTeacher);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $this->lastInsertId= $dbGateway->addYogaClass($yogaClass);
        $this->assertNotNull($this->lastInsertId);
    }

    public function testGetYogaClassDetails(){
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $yogaClass = $dbGateway->getYogaClassDetails($this->lastInsertId);
        $this->assertEquals("Slow Vinyasa Flow", $yogaClass[0]['CLASSNAME']);
    }
    protected function tearDown(): void
    {
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $countRowsDeleted = $dbGateway->removeYogaClass($this->lastInsertId);
        $this->assertEquals(1, $countRowsDeleted);
    }
}

