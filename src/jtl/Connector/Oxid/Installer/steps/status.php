<?php
namespace jtl\Connector\Oxid\Installer;

use jtl\Core\Config\Config;
use jtl\Core\Database\Mysql;
use jtl\Core\Utilities\Singleton;
use jtl\Core\Config\Loader\Json as ConfigJson;
use jtl\Connector\Oxid\Config\Loader\Config as ConfigLoader;

class installer extends Singleton
{
    public function __construct()
    {
        $json = new ConfigJson(CONNECTOR_DIR . '../../../config/config.json')   ;
        $config = new Config(array($json));
    }
}