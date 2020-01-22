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
     * YogaClass constructor.
     * @param $className
     * @param $yogaTeacherName
     * @param $yogaTeacherEmailId
     * @param $publicShared
     *
     */
    public function __construct($className) {
        $this->className = $className;
        $yogaTeacher = new YogaTeacher();
        $this->yogaTeacherName = $yogaTeacher->getTeacherName();
        $this->yogaTeacherEmailId = $yogaTeacher->getEmailId();
        $this->publicShared = 1;
        $this->poseIdList = array();
    }

    /**
     * @param mixed $className
     */
    private function setClassName($className): void {
        $this->className = $className;
    }

    /**
     * @param mixed $yogaTeacherName
     */
    public function setYogaTeacherName($yogaTeacherName): void {
        $this->yogaTeacherName = $yogaTeacherName;
    }

    /**
     * @param mixed $yogaTeacherEmailId
     */
    public function setYogaTeacherEmailId($yogaTeacherEmailId): void {
        $this->yogaTeacherEmailId = $yogaTeacherEmailId;
    }

    /**
     * @param mixed $publicShared
     */
    public function setPublicShared($publicShared): void {
        $this->publicShared = $publicShared;
    }

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
    public static function createYogaClassFromJson($jsonData): YogaClass{
        $yogaClass = new YogaClass($jsonData['className']);
        if(isset($jsonData['publicShared'])){
            $yogaClass->setPublicShared($jsonData['publicShared']);
        }
        if(isset($jsonData['poseIdList'])) {
            $yogaClass->setPoseIdList($jsonData['poseIdList']);
        }
        if(isset($jsonData['yogaTeacherName']) && isset($jsonData['yogaTeacherEmailId'])) {

            $yogaClass->setYogaTeacherName($jsonData['yogaTeacherName']);
            $yogaClass->setYogaTeacherName($jsonData['yogaTeacherEmailId']);
        }
        return  $yogaClass;

    }
    public function jsonSerialize() {
        return [
            'className' => $this->className,
            'yogaTeacherName' => $this->yogaTeacherName,
            'yogaTeacherEmailId' => $this->yogaTeacherEmailId,
            'publicShared' => $this->publicShared,
            'poseIdList' => $this->poseIdList
        ];
    }

}