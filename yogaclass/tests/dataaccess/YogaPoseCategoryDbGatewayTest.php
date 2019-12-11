<?php

namespace yogaclass\tests\dataaccess;

use PHPUnit\Framework\TestCase;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaPoseCategory.php';
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'YogaPoseCategoryDbGateway.php';

use yogaclass\src\dataaccess\YogaPoseCategoryDbGateway;
use yogaclass\src\businessobjects\YogaPoseCategory;
use \yogaclass\src\dataaccess\DataManager;
class YogaPoseCategoryDbGatewayTest {

    public static function testAddYogaPoseCategory() {

        $dbGateway = new YogaPoseCategoryDbGateway(DataManager::PERSISTENCE_UNIT_NAME);

        $ypc = new YogaPoseCategory('standing', time());
        $dbGateway->addYogaPoseCategory($ypc);

        $ypc2 = new YogaPoseCategory('sitting', time());
        $dbGateway->addYogaPoseCategory($ypc2);

        $ypc3 = new YogaPoseCategory('standing-backbend', time());
        $dbGateway->addYogaPoseCategory($ypc3);

        $ypc4 = new YogaPoseCategory('sitting-backbend ', time());
        $dbGateway->addYogaPoseCategory($ypc4);

        $ypc5 = new YogaPoseCategory('inversion', time());
        $dbGateway->addYogaPoseCategory($ypc5);
    }
}
YogaPoseCategoryDbGatewayTest::testAddYogaPoseCategory();
