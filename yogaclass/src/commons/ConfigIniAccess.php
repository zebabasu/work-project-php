<?php
namespace yogaclass\src\commons;

class ConfigIniAccess {
    private const CONFIG_INI_PATH = __DIR__.'/../../config/config.ini';

    public static function getConfigSection($section) {
        $iniFilePath = realpath(self::CONFIG_INI_PATH);
        if($iniFilePath){
            $iniFile = parse_ini_file($iniFilePath, true);
            if($iniFile) {
                return $iniFile[$section];
            }
            return false;
        }
       return false;

    }
}