<?php
namespace jtl\Connector\Oxid\Mapper\DeliveryNote;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\DeliveryNoteContainer;

/**
 * Summary of DeliveryNote
 */
class DeliveryNote extends BaseMapper
{
    protected $_config = array
    (
        "model" => "\\jtl\\Connector\\Model\\DeliveryNote",
        "table" => "",
        "mapPull" => array()
    );
}