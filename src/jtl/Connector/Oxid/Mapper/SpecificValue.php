<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\SpecificValue as SpecificValueModel;
use jtl\Connector\Model\SpecificValueI18n as SpecificValueI18nModel;
use jtl\Connector\Oxid\Mapper\SpecificValueI18n as SpecificValueI18nMapper;

class SpecificValue extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $specificValueTable = $this->getSpecificValue($data);
        $specificValueI18nModel = new SpecificValueI18nModel;
        $specificValueI18nMapper = new SpecificValueI18nMapper;
        
        foreach ($specificValueTable as $value)
        {
            $specificValueModel = new SpecificValueModel();
            
            $identity = new IdentityModel;
            $identity->setEndpoint($data['OXTITLE'] . '_' . $value['OXVALUE']);
            $specificValueModel->setId($identity);
            
            $identity = new IdentityModel;
            $identity->setEndpoint($data['OXID']);
            $specificValueModel->setSpecificId($identity);
            
            $specificValueModel->setSort(intval($value['OXPOS']));
            
            //$specificValueI18nModel = $specificValueI18nMapper->pull($varValueKey, $varValueKeyPos, $varKey, $varKeyPos, $data, 0, null);
            
            //foreach ($specificValueI18nModel as $I18nModel)
            //{
            //    $specificValueModel->addi18n($I18nModel);
            //}
            
            $return[] = $specificValueModel;
        }
        return $return;
    }
    
    public function getSpecificValue($params)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2attribute " .
                                      " WHERE OXATTRID = '{$params['OXID']}' " . 
                                      " GROUP BY OXVALUE ");
        return $sqlResult;
    }
}