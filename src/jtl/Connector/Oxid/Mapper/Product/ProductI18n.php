<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of ProductI18n
 */
class ProductI18n extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ProductI18n",
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_productId" => "OXID",
                    "_name" => "OXTITLE",
                    "_urlPath" => "OXEXTURL",
                    "_description" => "OXLONGDESC",
                    "_shortDescription" => "OXSHORTDESC"
                )
        );
}

/* non mapped properties
ProductI18n:
_localName

*/