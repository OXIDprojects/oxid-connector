<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\FileDownload as FileDownloadModel;

/**
 * Summary of FileDownload
 */
class FileDownload extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $fileDownload = new FileDownloadModel();
        
        foreach ($params as $value)
        {
            $fileDownload->_id = $value['OXID'];
            $fileDownload->_maxDownloads = $value['OXMAXDOWNLOADS'];
            $fileDownload->_created = $value['OXTIMESTAMP'];
            
            // Muss noch durch 24 und aufgerundet werden!
            if(isset($value['OXLINKEXPTIME']))
            {
                $MaxDays = round($value['OXLINKEXPTIME'] / 24);
                $fileDownload->_maxDays = $MaxDays;
            }

            $container->add('file_download', $fileDownload->getPublic(array('_fields')));
        }
    }
}

/* non mapped properties
 * FileDownload:
 * _sort
 * _previewPath
 * _path