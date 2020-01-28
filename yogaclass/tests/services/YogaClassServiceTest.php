<?php


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\commons\JsonToClassConverter;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\services\YogaClassService;
use PHPUnit\Framework\TestCase;

class YogaClassServiceTest extends TestCase {

    public function testCreateYogaClass() {

        $yogaClass = new YogaClass("mockYogaClass");
        $yogaClassJson = $yogaClass->jsonSerialize();
        $mockLastInsertedId = 100;

        $dbMock = $this->getMockBuilder(YogaClassDbGateway::class)
            ->setMethods(['addYogaClass'])
            ->getMock();

        $converterMock = $this->getMockBuilder(JsonToClassConverter::class)
            ->setMethods(['createYogaClassFromJson'])
            ->getMock();

        $converterMock->method('createYogaClassFromJson')->withAnyParameters()->willReturn($yogaClass);
        $dbMock->method('addYogaClass')->with($yogaClass)->willReturn($mockLastInsertedId);


        $testYogaClassService = new YogaClassService($dbMock, $converterMock);
        $actualLastInsertedId = $testYogaClassService->createYogaClass($yogaClassJson);

        $this->assertEquals($mockLastInsertedId, $actualLastInsertedId);
    }

    /*public function testGetAllYogaClasses() {

    }

    public function testYogaClassDetails() {

    }*/
}
