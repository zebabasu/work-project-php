<?php

namespace yogaclass\tests\dataaccess\functional;

use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use \yogaclass\src\dataaccess\DataManager;
require_once dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaClass.php';
require_once dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'YogaClassDbGateway.php';
require_once dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';

class YogaClassDbGatewayTest {

    public static function testAddYogaPose(){
        $yogaClass = new YogaClass("Slow Vinyasa Flow", 1);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $dbGateway->addYogaClass($yogaClass);
    }
}
YogaClassDbGatewayTest::testAddYogaPose();