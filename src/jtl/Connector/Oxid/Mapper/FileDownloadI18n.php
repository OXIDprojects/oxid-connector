<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class FileDownloadI18n extends BaseMapper
{  
    protected $mapperConfig = array
    (
     "model" => "\\jtl\\Connector\\Model\\FileDownloadI18n",
        "table" => "oxfiles",
        "pk" => "OXID",
        "mapPull" => array(
            "fileDownloadId" => "OXID",
            "name" => "OXFILENAME"
        ),
        "mapPush" => array(
            "OXID" => "_fileDownloadId",
            "OXFILENAME" => "_name"
        )
    );    
}