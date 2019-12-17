<?php


namespace yogaclass\src\services;


use yogaclass\src\dataaccess\YogaTeacherDbGateway;

class YogaTeacherService {

    private $dbGateway;
    public function __construct(){
        $this->dbGateway = new YogaTeacherDbGateway();
    }
    public function getAllYogaTeachers(){
        $listYogaTeacher = $this->dbGateway->getAllYogaTeachers();
        return $listYogaTeacher;
    }
}