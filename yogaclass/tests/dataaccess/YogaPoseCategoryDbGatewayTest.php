<?php

namespace yogaclass\tests\dataaccess;

use PHPUnit\Framework\TestCase;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaPoseCategory.php';
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'YogaPoseCategoryDbGateway.php';

use yogaclass\src\dataaccess\YogaPoseCategoryDbGateway;
use yogaclass\src\businessobjects\YogaPoseCategory;
class YogaPoseCategoryDbGatewayTest extends TestCase {

    public function testAddYogaPoseCategory1(){
        //$this->expectException(\PDOException::class);
        $dbGateway = new YogaPoseCategoryDbGateway();
        $ypc = new YogaPoseCategory('standing', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc);

        $ypc2 = new YogaPoseCategory('sitting', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc2);

        $ypc3 = new YogaPoseCategory('standing-backbend', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc3);

        $ypc4 = new YogaPoseCategory('sitting-backbend ', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc4);

        $ypc5 = new YogaPoseCategory('inversion', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc5);

        $this->assertGreaterThan(-1, $lastId);
    }
    public function testAddYogaPoseCategory2(){
        //$this->expectException(\PDOException::class);
        $dbGateway = new YogaPoseCategoryDbGateway();

        $ypc2 = new YogaPoseCategory('sitting', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc2);

        $this->assertGreaterThan(-1, $lastId);
    }
    public function testAddYogaPoseCategory3(){
        //$this->expectException(\PDOException::class);
        $dbGateway = new YogaPoseCategoryDbGateway();
        $ypc3 = new YogaPoseCategory('standing-backbend', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc3);

        $this->assertGreaterThan(-1, $lastId);
    }
    public function testAddYogaPoseCategory4(){
        //$this->expectException(\PDOException::class);
        $dbGateway = new YogaPoseCategoryDbGateway();
        $ypc4 = new YogaPoseCategory('sitting-backbend ', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc4);
        $this->assertGreaterThan(-1, $lastId);
    }
    public function testAddYogaPoseCategory5(){
        //$this->expectException(\PDOException::class);
        $dbGateway = new YogaPoseCategoryDbGateway();
        $ypc5 = new YogaPoseCategory('inversion', time());
        $lastId = $dbGateway->addYogaPoseCategory($ypc5);

        $this->assertGreaterThan(-1, $lastId);
    }
}
