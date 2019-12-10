<?php


use yogaclass\src\dataaccess\DataManager;
use PHPUnit\Framework\TestCase;
require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'dataaccess'.DIRECTORY_SEPARATOR.'DataManager.php';
class DataManagerTest extends TestCase {

    public function testConnect(){
        $dm = new DataManager();

        $pdo = $dm->connect();
        $this->assertStringContainsStringIgnoringCase("localhost", $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS));
    }

}
