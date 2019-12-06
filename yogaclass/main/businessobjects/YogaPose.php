<?php
namespace yogaclass\main\businessobjects;
class YogaPose
{
    private $id;
    private $imagePath;
    private $poseName;
    private $poseDescription;
    private $categories = array();

    public function __construct($imagePath, $poseName, $poseDescription, $categories) {
        $this->imagePath = $imagePath;
        $this->poseName = $poseName;
        $this->poseDescription = $poseDescription;
        $this->categories = $categories;
    }
}