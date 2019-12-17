<?php

namespace yogaclass\tests\dataaccess\functional;

use PHPUnit\Framework\TestCase;
use yogaclass\src\dataaccess\YogaPoseCategoryDbGateway;
use yogaclass\src\businessobjects\YogaPoseCategory;
use \yogaclass\src\dataaccess\DataManager;

/**
 * Class YogaPoseCategoryDbGatewayTest
 * @package yogaclass\tests\dataaccess
 * these aren't true unit tests as they need a database connection in yogaclass/config/config.ini
 */
class YogaPoseCategoryDbGatewayTest extends TestCase{

    public function testAddYogaPoseCategory() {

        $dbGateway = new YogaPoseCategoryDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $ypc = new YogaPoseCategory('deleteMe', time());
        $lastInsertId = $dbGateway->addYogaPoseCategory($ypc);
        $this->assertNotNull($lastInsertId);
    }
    protected function tearDown(): void
    {
        $dbGateway = new YogaPoseCategoryDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $countRowsDeleted = $dbGateway->removeYogaPoseCategory('deleteMe');
        $this->assertEquals(1, $countRowsDeleted);
    }
}

