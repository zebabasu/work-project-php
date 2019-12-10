<?php

namespace yogaclass\tests\businessobjects;

use PHPUnit\Framework\TestCase;
use ArrayObject;
require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'businessobjects'.DIRECTORY_SEPARATOR.'YogaPoseCategory.php';
use yogaclass\src\businessobjects\YogaPoseCategory;

class YogaPoseCategoryTest extends TestCase {
    /**
     *
     */
    public function testCreateObject() {

        $jsonString = $this::createJson();
        //echo($jsonString . "\n");
        $this::writeJsonToFile($jsonString);
        // Get the contents of the JSON file
        $jsonPath = realpath(__DIR__ . '/json/YogaPoseCategory.json');
        $strJsonFileContents = file_get_contents($jsonPath);
        //echo($strJsonFileContents . "\n");
        $listYogaPoseCategory = YogaPoseCategory::createArrayFromJson($strJsonFileContents);
        /*foreach ($listYogaPoseCategory as $category) {
            echo $category[poseCategoryName] . "\n";
        }*/
        $this->assertSame(5, count($listYogaPoseCategory));
        $this->assertSame(1,$listYogaPoseCategory[0]['id'] );
        $this->assertSame('standing',$listYogaPoseCategory[0]['poseCategoryName'] );
    }
    /**
     * @return ArrayObject
     */
    public static function createYogaPoseCategoryArray(): ArrayObject {
        $listYogaPoseCategory = new ArrayObject();

        $listYogaPoseCategory->append(new YogaPoseCategory(1, 'standing'));
        $listYogaPoseCategory->append(new YogaPoseCategory(2, 'sitting'));
        $listYogaPoseCategory->append(new YogaPoseCategory(3, 'standing-backbend'));
        $listYogaPoseCategory->append(new YogaPoseCategory(4, 'sitting-backbend'));
        $listYogaPoseCategory->append(new YogaPoseCategory(5, 'backbend'));
        return $listYogaPoseCategory;
    }

    private static function createJson(){
        $listYogaPoseCategory = self::createYogaPoseCategoryArray();

        $jsonString =  json_encode($listYogaPoseCategory, JSON_PRETTY_PRINT);
        return $jsonString;
   }
    private static function writeJsonToFile($jsonStr){
        $fp = fopen(__DIR__ . '/json/YogaPoseCategory.json', 'w') or die("Unable to open file!");;
        fwrite($fp, $jsonStr);
        fclose($fp);
    }


}

