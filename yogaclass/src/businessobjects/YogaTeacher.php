<?php


namespace yogaclass\src\businessobjects;


class YogaTeacher implements \JsonSerializable {

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

    public static function createArrayFromJson($jsonArray){
        $listYogaClass = json_decode($jsonArray, true);
        return  $listYogaClass;

    }
    public static function createJson($listYogaClass){
        $jsonString =  json_encode($listYogaClass, JSON_PRETTY_PRINT);
        return $jsonString;
    }
    public function jsonSerialize() {
        return [
            'teacherName' => $this->teacherName,
            'emailId' => $this->emailId
        ];
    }

}