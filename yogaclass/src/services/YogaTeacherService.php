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
    public function getYogaTeacher($name, $emailId){
        $yogaTeacher = $this->dbGateway->getYogaTeacher($name, $emailId);
        return $yogaTeacher;
    }

    public function getYogaTeacherByName($name){
        $yogaTeacher = $this->dbGateway->getYogaTeacherByName($name);
        return $yogaTeacher;
    }
}