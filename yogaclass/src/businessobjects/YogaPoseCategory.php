<?php
namespace yogaclass\src\businessobjects;
use JsonSerializable;
class YogaPoseCategory implements JsonSerializable{

    private $poseCategoryName;

    /**
     * @return mixed
     */
    public function getPoseCategoryName() {
        return $this->poseCategoryName;
    }
    private $lastUpdated;

    function __construct($poseCategoryName, $lastUpdated){
        $this->poseCategoryName = $poseCategoryName;
        $this->lastUpdated = $lastUpdated;

    }
    public static function createArrayFromJson($jsonArray){
        $listYogaPoseCategory = json_decode($jsonArray, true);
        return  $listYogaPoseCategory;

   }
   public function jsonSerialize() {
        return [
            'poseCategoryName' => $this->poseCategoryName,
            'lastUpdated' => $this->lastUpdated
        ];
    }
}