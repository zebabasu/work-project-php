<?php

namespace yogaclass\tests\dataaccess\functional;

use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\dataaccess\DataManager;
use PHPUnit\Framework\TestCase;

class YogaClassDbGatewayTest extends TestCase{

    private $lastInsertId;
    public function testAddYogaClass(){

        $yogaTeacher = new YogaTeacher();
        $yogaClass = new YogaClass("Slow Vinyasa Flow", 1, $yogaTeacher);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $this->lastInsertId= $dbGateway->addYogaClass($yogaClass);
        echo $this->lastInsertId;
        $this->assertNotNull($this->lastInsertId);
    }

    protected function tearDown(): void
    {
        echo "\n". $this->lastInsertId;
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $countRowsDeleted = $dbGateway->removeYogaClass($this->lastInsertId);
        $this->assertEquals(1, $countRowsDeleted);
    }
}

