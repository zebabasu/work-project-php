<?php

namespace yogaclass\tests\businessobjects;

use yogaclass\src\businessobjects\YogaPose;
use PHPUnit\Framework\TestCase;
use ArrayObject;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaPose.php';

class YogaPoseTest extends TestCase{

    public function testCreateObject() {

        $jsonString = self::createJson();
        $this::writeJsonToFile($jsonString);
        $jsonPath = realpath(__DIR__ . '/json/YogaPose.json');
        $strJsonFileContents = file_get_contents($jsonPath);
        $listYogaPose = YogaPose::createArrayFromJson($strJsonFileContents);

        $this->assertSame(3, count($listYogaPose));
        $this->assertSame("Camel Pose",$listYogaPose[0]['poseName'] );

    }
    /**
     * @return ArrayObject
     */
    public static function createYogaPoseArray(): ArrayObject {
        $listYogaPose = new ArrayObject();

        $listYogaPose->append(new YogaPose("c:/yoga-image-path/camelpose.jpg", "Camel Pose", "uses core strength", array(3)));
        $listYogaPose->append(new YogaPose("c:/yoga-image-path/pigeon.jpg", "Pigeon Pose", "hip stretch", array(2)));
        $listYogaPose->append(new YogaPose("c:/yoga-image-path/staff.jpg", "Staff Pose", "strenghthens back", array(2)));
        return $listYogaPose;
    }

    private static function createJson(){
        $listYogaPose = self::createYogaPoseArray();
        $jsonString =  json_encode($listYogaPose, JSON_PRETTY_PRINT);
        return $jsonString;
    }
    private static function writeJsonToFile($jsonStr){
        $fp = fopen(__DIR__ . '/json/YogaPose.json', 'w') or die("Unable to open file!");;
        fwrite($fp, $jsonStr);
        fclose($fp);
    }

}
