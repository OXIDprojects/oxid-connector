<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class ProductFileDownload extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxfiles",
            "PK" => "OXID",
            "mapPull" => array
            (
                "productId" => "OXARTID",
                "fileDownloadId" => "OXID"
            ),
            "mapPush" => array
            (
                "OXARTID" => "_productId",
                "OXID" => "_fileDownloadId"
            )
        );
}