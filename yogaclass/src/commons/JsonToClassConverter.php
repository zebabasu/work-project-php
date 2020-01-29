<?php


namespace yogaclass\src\commons;


use yogaclass\src\businessobjects\YogaClass;

class JsonToClassConverter {

    public function createYogaClassFromJson($jsonData): YogaClass{
        $yogaClass = new YogaClass($jsonData['className']);
        if(isset($jsonData['id'])){
            $yogaClass->setId($jsonData['id']);
        }
        if(isset($jsonData['publicShared'])){
            $yogaClass->setPublicShared($jsonData['publicShared']);
        }
        if(isset($jsonData['poseIdList'])) {
            $yogaClass->setPoseIdList($jsonData['poseIdList']);
        }
        if(isset($jsonData['yogaTeacherName']) && isset($jsonData['yogaTeacherEmailId'])) {

            $yogaClass->setYogaTeacherName($jsonData['yogaTeacherName']);
            $yogaClass->setYogaTeacherEmailId($jsonData['yogaTeacherEmailId']);
        }
        return  $yogaClass;

    }

}