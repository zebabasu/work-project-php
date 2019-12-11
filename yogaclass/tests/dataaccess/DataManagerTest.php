<?php


use yogaclass\src\dataaccess\DataManager;
use PHPUnit\Framework\TestCase;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';
class DataManagerTest extends TestCase {

    public function testConnect(){
        $pdo = DataManager::connect(DataManager::PERSISTENCE_UNIT_NAME);
        $this->assertStringContainsStringIgnoringCase("localhost", $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS));
    }

    public function testConnectFail(){
        try {
            $pdo = DataManager::connect("zz");
        } catch(PDOException $exception){
           $this->assertEquals($exception->getCode(), 0);
        }
    }

}
