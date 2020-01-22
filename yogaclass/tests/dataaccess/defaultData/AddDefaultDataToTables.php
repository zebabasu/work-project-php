<?php


use PHPUnit\Framework\TestCase;
use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\businessobjects\YogaPose;
use yogaclass\src\businessobjects\YogaPoseCategory;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\dataaccess\DataManager;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\dataaccess\YogaPoseCategoryDbGateway;
use yogaclass\src\dataaccess\YogaPoseDbGateway;
use yogaclass\src\dataaccess\YogaTeacherDbGateway;
class AddDefaultDataToTables extends TestCase {

    public function testAddYogaTeacher(){
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaTeacher1');
        /*********************************/

        $yogaTeacher = new YogaTeacher();
        $dbGateway = new YogaTeacherDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $lastInsertId = $dbGateway->addYogaTeacher($yogaTeacher);
        $this->assertNotNull($lastInsertId);
    }

    public function testAddYogaTeacher2(){
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaTeacher2');
        /*********************************/

        $yogaTeacher = new YogaTeacher("Zeba", "zeba@email.com");
        $dbGateway = new YogaTeacherDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $lastInsertId = $dbGateway->addYogaTeacher($yogaTeacher);
        $this->assertNotNull($lastInsertId);
    }

    public function testAddYogaClass(){
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaClass');
        /*********************************/

        $yogaClass = new YogaClass("Default Slow Vinyasa Flow");
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $lastInsertId = $dbGateway->addYogaClass($yogaClass);
        $this->assertNotNull($lastInsertId);
    }

    public function testAddYogaClass2(){
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaClass');
        /*********************************/
        $yogaTeacher = new YogaTeacher("Zeba", "zeba@email.com");
        $yogaClass = new YogaClass("Hatha Yoga");
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $lastInsertId = $dbGateway->addYogaClass($yogaClass);
        $this->assertNotNull($lastInsertId);
    }

    public function testAddYogaClass3(){
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaClass3');
        /*********************************/
        $yogaClass = new YogaClass("Ashtanga Yoga");
        $yogaClass->setYogaTeacherName("Zeba");
        $yogaClass->setYogaTeacherEmailId("zeba@email.com");
        $poseList1 = [17, 18];
        $yogaClass->setPoseIdList($poseList1);
        $dbGateway = new YogaClassDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $lastInsertId = $dbGateway->addYogaClass($yogaClass);
        $this->assertNotNull($lastInsertId);
    }

    public function testAddYogaPoseCategory() {
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaPoseCategory');
        /*********************************/
        $dbGateway = new YogaPoseCategoryDbGateway(DataManager::PERSISTENCE_UNIT_NAME);

        $ypc = new YogaPoseCategory('standing', time());
        $dbGateway->addYogaPoseCategory($ypc);

        $ypc2 = new YogaPoseCategory('sitting', time());
        $dbGateway->addYogaPoseCategory($ypc2);

        $ypc3 = new YogaPoseCategory('standing-backbend', time());
        $dbGateway->addYogaPoseCategory($ypc3);

        $ypc4 = new YogaPoseCategory('sitting-backbend ', time());
        $dbGateway->addYogaPoseCategory($ypc4);

        $ypc5 = new YogaPoseCategory('inversion', time());
        $dbGateway->addYogaPoseCategory($ypc5);
    }

    public function testAddYogaPose() {
        /*********************************/
        $this->markTestSkipped('skip test testAddYogaPoseCategory');
        /*********************************/
        $yogaPose1 = new YogaPose("salambasirsasan.PNG", "Salamba Sirsasan/Supported Headstand", "Strengthens your arms and shoulders", array("inversion"));
        $yogaPose2 = new YogaPose("sarvangasan.PNG", "Sarvangasan/Shoulderstand", "Stretches the shoulders and neck", array("inversion"));
        $yogaPose3 = new YogaPose("vrikshasan.PNG", "Vrikshasan.PNG/Tree Pose", "Strengthens your arms and shoulders", array("standing"));

        $dbGateway = new YogaPoseDbGateway(DataManager::PERSISTENCE_UNIT_NAME);
        $dbGateway->addYogaPose($yogaPose1);
        $dbGateway->addYogaPose($yogaPose2);
        $dbGateway->addYogaPose($yogaPose3);
    }

}
