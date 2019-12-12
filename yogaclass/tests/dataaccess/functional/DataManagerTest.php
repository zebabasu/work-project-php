<?php
namespace yogaclass\tests\dataaccess\functional;
use yogaclass\src\dataaccess\DataManager;
use PHPUnit\Framework\TestCase;
use PDO;
use PDOException;
require_once dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';
class DataManagerTest extends TestCase {

    public function testConnect(){
        $pdo = DataManager::connect(DataManager::PERSISTENCE_UNIT_NAME);
        $this->assertStringContainsStringIgnoringCase("localhost", $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS));
    }

    public function testConnectFail(){
        $this->expectException(PDOException::class);
        DataManager::connect("zz");
    }

}
