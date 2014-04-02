<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of ProductFileDownload
 */
class ProductFileDownload extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ProductFileDownload",
            "table" => "oxfiles",
            "PK" => "OXID",
            "mapPull" => array
            (
                "_productId" => "OXARTID",
                "_fileDownloadId" => "OXID"
            ),
            "mapPush" => array
            (
                "OXARTID" => "_productId",
                "OXID" => "_fileDownloadId"
            )
        );
}