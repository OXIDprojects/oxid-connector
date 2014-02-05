<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Oxid
 */
namespace jtl\Connector\Oxid\Config\Loader;

use \jtl\Core\Filesystem\Tool;
use \jtl\Core\Exception\ConfigException;
use \jtl\Core\Config\Loader\Base as BaseLoader;

require_once ("/../../../../../bootstrap.php");

class Config {

    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPwd;
    private $dbType;
    private $oxidShopPath;
    private $sShopURL;
    private $sSSLShopURL;
    private $sAdminSSLURL;
    private $sShopDir;
    private $sCompileDir;
    
    //DbHost
    public function setDbHost($dbHost) {
        $this->dbHost = $dbHost;
    }

    public function getDbHost() {
        return $this->dbHost;
    }

    //DbName
    public function setDbName($dbName) {
        $this->dbName = $dbName;
    }

    public function getDbName() {
        return $this->dbName;
    }

    //DbUser
    public function setDbUser($dbUser) {
        $this->dbUser = $dbUser;
    }

    public function getDbUser() {
        return $this->dbUser;
    }

    //DbPwd
    public function setDbPwd($dbPwd) {
        $this->dbPwd = $dbPwd;
    }

    public function getDbPwd() {
        return $this->dbPwd;
    }

    //DbType
    public function setDbType($dbType) {
        $this->dbType = $dbType;
    }

    public function getDbType() {
        return $this->dbType;
    }

    //OxidShopPath
    public function setOxidShopPath($oxidShopPath){
        $this->OxidShopPath = $oxidShopPath;
    }
    
    public function getOxidShopPath() {
        return $this->OxidShopPath;
    }
    
    //SShopURL
    public function setSShopURL($sShopURL) {
        $this->sShopURL = $sShopURL;
    }

    public function getSShopURL() {
        return $this->sShopURL;
    }

    //SSSLShopURL
    public function setSSSLShopURL($sSSLShopURL) {
        $this->sSSLShopURL = $sSSLShopURL;
    }

    public function getSSSLShopURL() {
        return $this->sSSLShopURL;
    }

    //SAdminSSLURL
    public function setSAdminSSLURL($sAdminSSLURL) {
        $this->sAdminSSLURL = $sAdminSSLURL;
    }

    public function getSAdminSSLURL() {
        return $this->sAdminSSLURL;
    }

    //SShopDir
    public function setSShopDir($sShopDir) {
        $this->sShopDir = $sShopDir;
    }

    public function getSShopDir() {
        return $this->sShopDir;
    }

    //SCompileDir
    public function setSCompileDir($sCompileDir) {
        $this->sCompileDir = $sCompileDir;
    }

    public function getSCompileDir() {
        return $this->sCompileDir;
    }


    public function getConfigs() {
        
        $dbHostConf = array();
        $dbNameConf = array();
        $dbUserConf = array();
        $dbPwdConf = array();
        $dbTypeConf = array();
        $sShopURLConf = array();
        $sSSLShopURLConf = array();
        $sAdminSSLURLConf = array();
        $sShopDirConf = array();
        $sCompileDirConf = array();

        
        $datei = "config.inc.php";
        $file = file_get_contents(OXID_SHOP_PATH . $datei, true);

        If (preg_match("/dbHost = '(.*?)'/is", $file, $dbHostConf) != 0) {
            $this->dbHost = $dbHostConf[1];
        }

        If (preg_match("/dbName = '(.*?)'/is", $file, $dbNameConf) != 0) {
            $this->dbName = $dbNameConf[1];
        }

        If (preg_match("/dbUser = '(.*?)'/is", $file, $dbUserConf) != 0) {
            $this->dbUser = $dbUserConf[1];
        }

        If (preg_match("/dbPwd = '(.*?)'/is", $file, $dbPwdConf) != 0) {
            $this->dbPwd = $dbPwdConf[1];
        }

        If (preg_match("/dbType = '(.*?)'/is", $file, $dbTypeConf) != 0) {
            $this->dbType = $dbTypeConf[1];
        }

        If (preg_match("/sShopURL = '(.*?)'/is", $file, $sShopURLConf) != 0) {
            $this->sShopURL = $sShopURLConf[1];
        }

        If (preg_match("/sSSLShopURL = '(.*?)'/is", $file, $sSSLShopURLConf) != 0) {
            $this->sSSLShopURL = $sSSLShopURLConf[1];
        }

        If (preg_match("/sAdminSSLURL = '(.*?)'/is", $file, $sAdminSSLURLConf) != 0) {
            $this->sAdminSSLURL = $sAdminSSLURLConf[1];
        }

        If (preg_match("/sShopDir = '(.*?)'/is", $file, $sShopDirConf) != 0) {
            $this->sShopDir = $sShopDirConf[1];
        }

        If (preg_match("/sCompileDir = '(.*?)'/is", $file, $sCompileDirConf) != 0) {
            $this->sCompileDir = $sCompileDirConf[1];
        }
    }

    //Undefinierte Methoden aufrufe abfangen
    public function __call($name, $arguments) {
        If (!empty($arguments)) {
            $ausgabe = "Die Methode: " . $name .
                    " mit dem Parameter: " . $arguments .
                    " existiert nicht.";
        } Else {
            $ausgabe = "Die Methode: " . $name .
                    " existiert nicht.";
        }
        echo $ausgabe;
    }

    //Undefinierte Eigenschaft aufrufe abfangen
    public function __get($name) {
        echo "Die Eigenschaft: " . $name . " existiert nicht.";
    }

}
?>