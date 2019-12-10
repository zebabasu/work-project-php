<?php
namespace yogaclass\src\businessobjects;
use JsonSerializable;
class YogaPose implements JsonSerializable
{
    private $id;
    private $imagePath;
    private $poseName;
    private $poseDescription;
    private $categories = array();

    function __construct($imagePath, $poseName, $poseDescription, $categories) {
        $this->imagePath = $imagePath;
        $this->poseName = $poseName;
        $this->poseDescription = $poseDescription;
        $this->categories = $categories;
    }
    public static function createArrayFromJson($jsonArray){
        $listYogaPoseCategory = json_decode($jsonArray, true);
        return  $listYogaPoseCategory;

    }
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'imagePath' => $this->imagePath,
            'poseName' => $this->poseName,
            'poseDescription' => $this->poseDescription,
            'categories' => $this->categories
        ];
    }
}