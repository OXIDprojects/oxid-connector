<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

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
        "table" => "oxfiles",
        "pk" => "OXID",
        "mapPull" => array(
            "_id" => "OXID",
            "_maxDownloads" => "OXMAXDOWNLOADS",
            "_maxDays" => null,
            "_created" => "OXTIMESTAMP"
        )
    );
    
    public function _maxDays($data) {
        if(isset($data['OXLINKEXPTIME']))
        {
            $maxDays = round($data['OXLINKEXPTIME'] / 24);
            return $maxDays;
        }else{
            return null;
        }
    }          
}

/* non mapped properties
 * FileDownload:
 * _sort
 * _previewPath
 * _path
 */