<?php

namespace yogaclass\tests\businessobjects;
use ArrayObject;
use PHPUnit\Framework\TestCase;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\businessobjects\YogaClass;

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
        $yogaTeacher = new YogaTeacher();
        $listYogaClass->append(new YogaClass("Slow Flow", 1, $yogaTeacher));
        $listYogaClass->append(new YogaClass("Ashtanga Primary", 0, $yogaTeacher));
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
