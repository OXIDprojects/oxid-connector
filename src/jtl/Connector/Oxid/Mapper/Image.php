<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ImageContainer;

/**
 * Summary of Image
 */
class Image extends BaseMapper
{
    protected $_config = array
    (
        "model" => "\\jtl\\Connector\\Model\\Image",
        "table" => "",
        "mapPull" => array()
    );
}
