<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Oxid
 */
namespace jtl\Connector\Oxid\Config\Loader;

use \jtl\Core\Filesystem\Tool,
\jtl\Core\Exception\ConfigException,
\jtl\Core\Config\Loader\Base as BaseLoader;

require_once("/../../../../../bootstrap.php");
require_once("/../../Utilities/OxConfunctions.php");

/**
 * Summary of Config
 */
class Config
{
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
    private $sConfigKey;

    //DbHost
    public function setDbHost($dbHost)
    {
        $this->dbHost = $dbHost;
    }

    public function getDbHost()
    {
        return $this->dbHost;
    }

    //DbName
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }

    public function getDbName()
    {
        return $this->dbName;
    }

    //DbUser
    public function setDbUser($dbUser)
    {
        $this->dbUser = $dbUser;
    }

    public function getDbUser()
	{
        return $this->dbUser;
    }

    //DbPwd
    public function setDbPwd($dbPwd)
    {
        $this->dbPwd = $dbPwd;
    }

    public function getDbPwd()
    {
        return $this->dbPwd;
    }

    //DbType
    public function setDbType($dbType)
    {
        $this->dbType = $dbType;
    }

    public function getDbType()
    {
        return $this->dbType;
    }

    //OxidShopPath
    public function setOxidShopPath($oxidShopPath)
    {
        $this->OxidShopPath = $oxidShopPath;
    }

    public function getOxidShopPath()
    {
        return $this->OxidShopPath;
    }

    //SShopURL
    public function setSShopURL($sShopURL)
    {
        $this->sShopURL = $sShopURL;
    }

    public function getSShopURL()
    {
        return $this->sShopURL;
    }

    //SSSLShopURL
    public function setSSSLShopURL($sSSLShopURL)
    {
        $this->sSSLShopURL = $sSSLShopURL;
    }

    public function getSSSLShopURL()
    {
        return $this->sSSLShopURL;
    }

    //SAdminSSLURL
    public function setSAdminSSLURL($sAdminSSLURL)
    {
        $this->sAdminSSLURL = $sAdminSSLURL;
    }

    public function getSAdminSSLURL()
    {
        return $this->sAdminSSLURL;
    }

    //SShopDir
    public function setSShopDir($sShopDir)
    {
        $this->sShopDir = $sShopDir;
    }

    public function getSShopDir()
    {
        return $this->sShopDir;
    }

    //SCompileDir
    public function setSCompileDir($sCompileDir)
    {
        $this->sCompileDir = $sCompileDir;
    }

    public function getSCompileDir()
    {
        return $this->sCompileDir;
    }

    //sConfigKey
    public function setSConfigKey($sConfigKey)
    {
        $this->sConfigKey = $sConfigKey;
    }

    public function getSConfigKey()
    {
        return $this->sConfigKey;
    }


    public function getConfigs()
    {

        $ConfDatei = "config.inc.php";
        //$ConfFile = file_get_contents($oxidShopPath . $datei, true);
        $ConfFile = file_get_contents("../../../../../../oxid-shop/{$ConfDatei}", true);

        if (preg_match("/dbHost = '(.*?)'/is", $ConfFile, $dbHostConf) != 0)
        {
            $this->dbHost = $dbHostConf[1];
        }

        if (preg_match("/dbName = '(.*?)'/is", $ConfFile, $dbNameConf) != 0)
        {
            $this->dbName = $dbNameConf[1];
        }

        if (preg_match("/dbUser = '(.*?)'/is", $ConfFile, $dbUserConf) != 0)
        {
            $this->dbUser = $dbUserConf[1];
        }

        if (preg_match("/dbPwd = '(.*?)'/is", $ConfFile, $dbPwdConf) != 0)
        {
            $this->dbPwd = $dbPwdConf[1];
        }

        if (preg_match("/dbType = '(.*?)'/is", $ConfFile, $dbTypeConf) != 0)
        {
            $this->dbType = $dbTypeConf[1];
        }

        if (preg_match("/sShopURL = '(.*?)'/is", $ConfFile, $sShopURLConf) != 0)
        {
            $this->sShopURL = $sShopURLConf[1];
        }

        if (preg_match("/sSSLShopURL = '(.*?)'/is", $ConfFile, $sSSLShopURLConf) != 0)
        {
            $this->sSSLShopURL = $sSSLShopURLConf[1];
        }

        if (preg_match("/sAdminSSLURL = '(.*?)'/is", $ConfFile, $sAdminSSLURLConf) != 0)
        {
            $this->sAdminSSLURL = $sAdminSSLURLConf[1];
        }

        if (preg_match("/sShopDir = '(.*?)'/is", $ConfFile, $sShopDirConf) != 0)
        {
            $this->sShopDir = $sShopDirConf[1];
        }

        if (preg_match("/sCompileDir = '(.*?)'/is", $ConfFile, $sCompileDirConf) != 0)
        {
            $this->sCompileDir = $sCompileDirConf[1];
        }


        $ConfkDatei = "core/oxconfk.php";
        //$ConfkFile = file_get_contents($oxidShopPath . $ConfkDatei, true);
        $ConfkFile = file_get_contents("../../../../../../oxid-shop/{$ConfkDatei}", true);

        if (preg_match("/sConfigKey = \"(.*?)\"/is", $ConfkFile, $sConfigKey) != 0)
        {
            $this->sConfigKey = $sConfigKey[1];
        }
    }
}
