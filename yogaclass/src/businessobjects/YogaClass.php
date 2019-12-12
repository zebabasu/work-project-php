<?php


namespace yogaclass\src\businessobjects;


class YogaClass implements \JsonSerializable {
    private $className;
    private $yogaTeacherName;
    private $yogaTeacherEmailId;
    private $publicShared;

    /**
     * YogaClass constructor.
     * @param $className
     * @param $yogaTeacherName
     * @param $yogaTeacherEmailId
     * @param $publicShared
     */
    public function __construct($className, $yogaTeacherName, $yogaTeacherEmailId, $publicShared) {
        $this->className = $className;
        $this->yogaTeacherName = $yogaTeacherName;
        $this->yogaTeacherEmailId = $yogaTeacherEmailId;
        $this->publicShared = $publicShared;
    }

    /**
     * @return mixed
     */
    public function getClassName() {
        return $this->className;
    }

    /**
     * @return mixed
     */
    public function getYogaTeacherName() {
        return $this->yogaTeacherName;
    }

    /**
     * @return mixed
     */
    public function getYogaTeacherEmailId() {
        return $this->yogaTeacherEmailId;
    }

    /**
     * @return mixed
     */
    public function getPublicShared() {
        return $this->publicShared;
    }
    public static function createArrayFromJson($jsonArray){
        $listYogaClass = json_decode($jsonArray, true);
        return  $listYogaClass;

    }
    public function jsonSerialize() {
        return [
            'className' => $this->className,
            'yogaTeacherName' => $this->yogaTeacherName,
            'yogaTeacherEmailId' => $this->yogaTeacherEmailId,
            'publicShared' => $this->publicShared
        ];
    }

}