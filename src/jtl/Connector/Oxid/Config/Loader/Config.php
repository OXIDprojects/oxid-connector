<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Oxid
 */
namespace jtl\Connector\Oxid\Config\Loader;

use jtl\Core\Filesystem\Tool;
use jtl\Core\Exception\ConfigException;
use jtl\Core\Config\Base as BaseConfig;
use jtl\Core\Config\Loader\Base as BaseLoader;


/**
 * Summary of Config
 */
class Config extends BaseLoader
{
    public function __construct()
    {
        $ConfDatei = "config.inc.php";
        include(OXID_DIR . $ConfDatei);

        $ConfkDatei = "core/oxconfk.php";
        include(OXID_DIR . $ConfkDatei);
    }
}