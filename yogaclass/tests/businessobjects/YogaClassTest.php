<?php

namespace yogaclass\tests\businessobjects;

use yogaclass\src\businessobjects\YogaClass;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaClass.php';
use ArrayObject;
use PHPUnit\Framework\TestCase;

class YogaClassTest extends TestCase {

    public function testCreateObject() {

        $jsonString = self::createJson();
        $this::writeJsonToFile($jsonString);
        $jsonPath = realpath(__DIR__ . '/json/YogaClass.json');
        $strJsonFileContents = file_get_contents($jsonPath);
        $listYogaClass = YogaClass::createArrayFromJson($strJsonFileContents);

        $this->assertSame(2, count($listYogaClass));
        $this->assertSame("Slow Flow",$listYogaClass[0]['className'] );

    }

    public static function createYogaClassArray(): ArrayObject {
        $listYogaClass = new ArrayObject();

        $listYogaClass->append(new YogaClass("Slow Flow", "Default Yoga Teacher", "teacher@email.com", 1));
        $listYogaClass->append(new YogaClass("Ashtanga Primary", "Default Yoga Teacher", "teacher@email.com", 0));
        return $listYogaClass;
    }

    private static function createJson(){
        $listYogaClass = self::createYogaClassArray();

        $jsonString =  json_encode($listYogaClass, JSON_PRETTY_PRINT);
        return $jsonString;
    }

    private static function writeJsonToFile($jsonStr){
        $fp = fopen(__DIR__ . '/json/YogaClass.json', 'w') or die("Unable to open file!");;
        fwrite($fp, $jsonStr);
        fclose($fp);
    }
}
