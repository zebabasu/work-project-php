<?php

namespace yogaclass\main\dataaccess;
use PDO;
class DataManager {

    function connect($dbInfo)
    {
        try {

            $connStr = "mysql:host={$dbInfo['host']};{$dbInfo['dbname']}";
            $conn = new PDO($connStr, $dbInfo['username'], $dbInfo['password']);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $exception) {
            echo "error";
            exit($exception->getMessage());
        }
    }
}
$ini = parse_ini_file('C:/Users/zbasu/workspace/IdeaProjects/work-project-php/yogaclass/config/config.ini');

$dm = new DataManager();
$dm->connect($ini);
//phpinfo();