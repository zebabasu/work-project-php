<?php
namespace yogaclass\businessobjects;

class YogaPoseCategory
{
    private $id;
    private $poseCategoryName;

    public function __construct($poseCategoryName){
        $this->poseCategoryName = $poseCategoryName;
    }
}