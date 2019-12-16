<?php


namespace yogaclass\src\services;


use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\dataaccess\YogaClassDbGateway;

class YogaClassService {
    private static $dbGateway;

    public static function createYogaClass($className, $publicShared, YogaTeacher $yogateacher){
        YogaClassService::$dbGateway = new YogaClassDbGateway();
        $yogaClass = YogaClass($className, $publicShared, $yogateacher);
        YogaClassService::$dbGateway->addYogaClass($yogaClass);
    }
    public static function getAllYogaClasses(){
        //SELECT CLASSNAME, YOGATEACHER_NAME, YOGATEACHER_EMAIL_ID, PUBLICSHARED FROM YOGA_CLASS
        YogaClassService::$dbGateway = new YogaClassDbGateway();

    }


}