<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductFileDownload as ProductFileDownloadModel;

class ProductFileDownload extends BaseMapper
{   
    public function pull($data=null, $offset=0, $limit=null) {
        
        $return = [];
        $productFileDownloadTable = $this->getProductFileDownload($data);
        
        foreach ($productFileDownloadTable as $value)
        {
            $productFileDownloadModel = new ProductFileDownloadModel();
            
            $identityModel = new IdentityModel();    
            $identityModel->setEndpoint($value['OXARTID']);
            $productFileDownloadModel->setProductId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $productFileDownloadModel->setFileDownloadId($identityModel);
            
            $return[] = $productFileDownloadModel;
        }
        return $return;
    }
    
    public function getProductFileDownload($param)
    {      
        $sqlResult = $this->db->query(" SELECT * FROM oxfiles " .
                                      " WHERE OXARTID = '{$param['OXID']}' ");
        
        return $sqlResult;
    }  
}