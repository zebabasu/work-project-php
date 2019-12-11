<?php
namespace yogaclass\tests\commons;

require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'commons'.DIRECTORY_SEPARATOR.'ConfigIniAccess.php';
use yogaclass\src\commons\ConfigIniAccess;
use PHPUnit\Framework\TestCase;

class ConfigIniAccessTest extends TestCase {

    public function testGetConfigSection(){
        $iniSection = ConfigIniAccess::getConfigSection("YogaPersistenceUnit");
        $this->assertSame("root", $iniSection['username']);
    }
    public function testGetConfigSectionFalse(){
        $iniSection = ConfigIniAccess::getConfigSection("ZZZ");
        $this->assertNull($iniSection['username']);
    }
}
