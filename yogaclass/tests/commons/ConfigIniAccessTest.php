<?php
namespace yogaclass\tests\commons;


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
