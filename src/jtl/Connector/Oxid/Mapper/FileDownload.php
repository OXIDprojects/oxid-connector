<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class FileDownload extends BaseMapper
{  
    protected $mapperConfig = array
    (
        "table" => "oxfiles",
        "pk" => "OXID",
        "mapPull" => array(
            "id" => "OXID",
            "maxDownloads" => "OXMAXDOWNLOADS",
            "maxDays" => null,
            "created" => null
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXMAXDOWNLOADS" => "_maxDownloads",
            "OXLINKEXPTIME" => null,
            "OXTIMESTAMP" => "_created"
        )
    );
    
    public function maxDays($data) {
        if(isset($data['OXLINKEXPTIME']))
        {
            $maxDays = round($data['OXLINKEXPTIME'] / 24);
            return $maxDays;
        }else{
            return null;
        }
    }
    
    public function created($data)
    {
        return $this->stringToDateTime($data['OXTIMESTAMP']);
    }
    
    public function OXLINKEXPTIME($data)
    {
        if(isset($data['_maxDays']))
        {
            $maxTime = round($data['OXLINKEXPTIME'] * 24);
            return $maxTime;
        }else{
            return null;
        }
    }
}