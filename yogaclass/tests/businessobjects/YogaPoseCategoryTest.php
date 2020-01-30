<?php

namespace yogaclass\tests\businessobjects;

use PHPUnit\Framework\TestCase;
use ArrayObject;
use yogaclass\src\businessobjects\YogaPoseCategory;

class YogaPoseCategoryTest extends TestCase {
    /**
     *
     */
    public function testCreateObject() {

        $jsonString = $this::createJson();
        $this::writeJsonToFile($jsonString);
        $jsonPath = realpath(__DIR__ . '/json/YogaPoseCategory.json');
        $strJsonFileContents = file_get_contents($jsonPath);
        $listYogaPoseCategory = YogaPoseCategory::createArrayFromJson($strJsonFileContents);
        $this->assertSame(5, count($listYogaPoseCategory));
        $this->assertSame('standing',$listYogaPoseCategory[0]['poseCategoryName'] );
    }
    /**
     * @return ArrayObject
     */
    public static function createMockYogaPoseCategoryArray(): ArrayObject {
        $listYogaPoseCategory = new ArrayObject();

        $listYogaPoseCategory->append(new YogaPoseCategory('standing', time()));
        $listYogaPoseCategory->append(new YogaPoseCategory('sitting', time()));
        $listYogaPoseCategory->append(new YogaPoseCategory('standing-backbend', time()));
        $listYogaPoseCategory->append(new YogaPoseCategory('sitting-backbend', time()));
        $listYogaPoseCategory->append(new YogaPoseCategory( 'backbend', time()));
        return $listYogaPoseCategory;
    }

    private static function createJson(){
        $listYogaPoseCategory = self::createMockYogaPoseCategoryArray();

        $jsonString =  json_encode($listYogaPoseCategory, JSON_PRETTY_PRINT);
        return $jsonString;
   }
    private static function writeJsonToFile($jsonStr){
        $fp = fopen(__DIR__ . '/json/YogaPoseCategory.json', 'w') or die("Unable to open file!");;
        fwrite($fp, $jsonStr);
        fclose($fp);
    }


}

