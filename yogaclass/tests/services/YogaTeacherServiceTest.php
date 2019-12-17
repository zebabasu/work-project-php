<?php


use yogaclass\src\services\YogaTeacherService;
use PHPUnit\Framework\TestCase;

class YogaTeacherServiceTest extends TestCase {

    public function testGetYogaTeacher() {
        $getTeacher = new YogaTeacherService();
        $result = $getTeacher->getYogaTeacherByName("Zeba");
        var_dump($result);
    }

    public function testGetAllYogaTeachers() {

    }
}
