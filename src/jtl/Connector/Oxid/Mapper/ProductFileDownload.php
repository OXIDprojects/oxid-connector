<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class ProductFileDownload extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxfiles",
            "query" => "SELECT * FROM oxfiles
                WHERE OXARTID = [[OXID]]",
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
    
    public function pull($data=null, $offset=0, $limit=null) {
        return array($this->generateModel($data));
    }
}