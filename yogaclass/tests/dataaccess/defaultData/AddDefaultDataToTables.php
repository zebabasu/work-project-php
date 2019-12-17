<?php


use PHPUnit\Framework\TestCase;
use yogaclass\src\businessobjects\YogaClass;
use yogaclass\src\businessobjects\YogaPoseCategory;
use yogaclass\src\businessobjects\YogaTeacher;
use yogaclass\src\dataaccess\DataManager;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\dataaccess\YogaPoseCategoryDbGateway;
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
        //$this->markTestSkipped('skip test testAddYogaClass');
        /*********************************/
        $yogaTeacher = new YogaTeacher();
        $yogaClass = new YogaClass("Default Slow Vinyasa Flow", 1, $yogaTeacher);
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


}
