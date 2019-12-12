<?php


namespace yogaclass\src\businessobjects;


class YogaTeacher {

    private $teacherName;
    private $emailId;

    /**
     * YogaTeacher constructor.
     * @param $teacherName
     * @param $emailId
     */
    public function __construct($teacherName='Default Yoga Teacher', $emailId='teacher@email.com') {
        $this->teacherName = $teacherName;
        $this->emailId = $emailId;
    }

    /**
     * @return mixed
     */
    public function getTeacherName() {
        return $this->teacherName;
    }

    /**
     * @return mixed
     */
    public function getEmailId() {
        return $this->emailId;
    }

}