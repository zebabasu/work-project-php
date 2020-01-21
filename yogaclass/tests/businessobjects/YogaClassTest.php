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
        $strFileContents = file_get_contents($jsonPath);
        $jsonData = json_decode($strFileContents, true);

        $yogaClass = YogaClass::createYogaClassFromJson($jsonData);
        $this->assertSame("Slow Flow",$yogaClass->getClassName() );
        $this->assertSame(2,count($yogaClass->getPoseIdList()) );
    }

    public static function createMockYogaClassArray(): ArrayObject {
        $listYogaClass = new ArrayObject();
        $yogaTeacher = new YogaTeacher();
        $poseList1 = [17, 18];
        $yogaClass1 = new YogaClass("Slow Flow", 1, $yogaTeacher);
        $yogaClass1->setPoseIdList($poseList1);
        $listYogaClass->append($yogaClass1);

        $yogaClass2 = new YogaClass("Ashtanga Primary", 0, $yogaTeacher);
        $yogaClass2->setPoseIdList($poseList1);
        $listYogaClass->append($yogaClass2);
        return $listYogaClass;
    }
    public static function createMockYogaClass() {

        $yogaTeacher = new YogaTeacher();
        $poseList1 = [17, 18];
        $yogaClass1 = new YogaClass("Slow Flow", 1, $yogaTeacher);
        $yogaClass1->setPoseIdList($poseList1);



        return $yogaClass1;
    }
    private static function createJson(){
        $yogaClass = self::createMockYogaClass();
        $jsonString =  json_encode($yogaClass, JSON_PRETTY_PRINT);
        return $jsonString;
    }
    private static function createJsonArray(){
        $listYogaClass = self::createMockYogaClassArray();

        $jsonString =  json_encode($listYogaClass, JSON_PRETTY_PRINT);
        return $jsonString;
    }
    private static function writeJsonToFile($jsonStr){
        $fp = fopen(__DIR__ . '/json/YogaClass.json', 'w') or die("Unable to open file!");;
        fwrite($fp, $jsonStr);
        fclose($fp);
    }
}
