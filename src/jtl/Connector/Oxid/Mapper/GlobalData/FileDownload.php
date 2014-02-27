<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of FileDownload
 */
class FileDownload extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\FileDownload",
            "table" => "",
    	    "mapPull" => array()
        );
}
