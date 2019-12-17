<?php
namespace yogaclass\tests\dataaccess\functional;
use yogaclass\src\dataaccess\DataManager;
use PHPUnit\Framework\TestCase;
use PDO;
use PDOException;

class DataManagerTest extends TestCase {

    public function testConnect(){
        $dm = new DataManager(DataManager::PERSISTENCE_UNIT_NAME);
        $this->assertEquals("localhost via TCP/IP", $dm->getAttribute(PDO::ATTR_CONNECTION_STATUS));

    }

    public function testConnectFail(){
        $this->expectException(PDOException::class);
        DataManager::connect("zz");
    }

}
