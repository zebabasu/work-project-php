<?php


namespace yogaclass\src\businessobjects;


class YogaClass implements \JsonSerializable {
    private $id;
    private $className;
    private $yogaTeacherName;
    private $yogaTeacherEmailId;
    private $publicShared;
    private $poseIdList;

    /**
     * @return array
     */
    public function getPoseIdList(): array {
        return $this->poseIdList;
    }

    /**
     * @param array $poseIdList
     */
    public function setPoseIdList(array $poseIdList): void {
        $this->poseIdList = $poseIdList;
    }
    /**
     * YogaClass constructor.
     * @param $className
     * @param $yogaTeacherName
     * @param $yogaTeacherEmailId
     * @param $publicShared
     *
     */
    public function __construct($className, $publicShared, YogaTeacher $yogaTeacher) {
        $this->className = $className;
        $this->yogaTeacherName = $yogaTeacher->getTeacherName();
        $this->yogaTeacherEmailId = $yogaTeacher->getEmailId();
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
    public static function createJson($listYogaClass){
        $jsonString =  json_encode($listYogaClass, JSON_PRETTY_PRINT);
        return $jsonString;
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