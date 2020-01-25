<?php


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\dataaccess\DataManager;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\services\YogaClassService;
use PHPUnit\Framework\TestCase;

class YogaClassServiceTest extends TestCase {

    public function testCreateYogaClass() {
        $dbMock = $this->getMockBuilder(YogaClassDbGateway::class)
            ->setMethods(['addYogaClass'])
            ->getMock();
        $mockLastInsertedId = 100;
        $dbMock->method('addYogaClass')->willReturn($mockLastInsertedId);
        $testYogaClassService = new YogaClassService($dbMock);
    }

    public function testGetAllYogaClasses() {

    }

    public function testYogaClassDetails() {

    }
}
