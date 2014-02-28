<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Oxid
 */
namespace jtl\Connector\Oxid\Config\Loader;

//use \jtl\Core\Config\Loader\Base as BaseLoader;
use \jtl\Core\Config\Base as BaseConfig;
use \jtl\Core\Exception\ConfigException;
use \jtl\Core\Filesystem\Tool;

/**
 * Summary of Config
 */
class Config
{
    public function __construct()
    {
        $oxidShopPath = "../../../../../../../oxid-shop/";

        $ConfDatei = "config.inc.php";
        require_once($oxidShopPath . $ConfDatei);

        $ConfkDatei = "core/oxconfk.php";
        require_once($oxidShopPath . $ConfkDatei);
    }
}