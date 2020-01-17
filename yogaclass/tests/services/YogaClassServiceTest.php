<?php


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\dataaccess\DataManager;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\services\YogaClassService;
use PHPUnit\Framework\TestCase;

class YogaClassServiceTest extends TestCase {

    public function testCreateYogaClass() {
        $yogaTeacher = new YogaTeacher();
        $yogaClass = new YogaClass("Slow Vinyasa Flow", 1, $yogaTeacher);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $lastInsertId= $dbGateway->addYogaClass($yogaClass);
    }

    public function testGetAllYogaClasses() {
        $yogaClassService = new YogaClassService();
        $jsonYCL = $yogaClassService->getAllYogaClasses();
    }

    public function testYogaClassDetails() {
        $yogaClassService = new YogaClassService();
        $jsonYCL = $yogaClassService->getYogaClassDetails(25);
    }
}
