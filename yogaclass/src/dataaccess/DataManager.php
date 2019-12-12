<?php


namespace yogaclass\src\dataaccess;
use PDO;
use yogaclass\src\commons\ConfigIniAccess;
require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'commons'.DIRECTORY_SEPARATOR.'ConfigIniAccess.php';
class DataManager {
    public const PERSISTENCE_UNIT_NAME = 'YogaPersistenceUnit';

    public static function connect($persistenceUnitName) : PDO
    {
        $iniConnectionData = ConfigIniAccess::getConfigSection($persistenceUnitName);
        try {
            $url = $iniConnectionData['url'];

            $username = $iniConnectionData['username'];
            $password = $iniConnectionData['password'];

            $conn = new PDO($url, $username, $password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $exception) {
            echo 'Exception -> ';
            var_dump($exception->getMessage());
        } throw $exception;
    }
}