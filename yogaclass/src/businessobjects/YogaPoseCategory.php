<?php
namespace yogaclass\src\businessobjects;
use JsonSerializable;
class YogaPoseCategory implements JsonSerializable{

    private $id;
    private $poseCategoryName;

    function __construct($id, $poseCategoryName){
        $this->id = $id;
        $this->poseCategoryName = $poseCategoryName;
    }
    public static function createArrayFromJson($jsonArray){
        $listYogaPoseCategory = json_decode($jsonArray, true);
        return  $listYogaPoseCategory;

   }
   public function jsonSerialize() {
        return [
            'id' => $this->id,
            'poseCategoryName' => $this->poseCategoryName
        ];
    }
}