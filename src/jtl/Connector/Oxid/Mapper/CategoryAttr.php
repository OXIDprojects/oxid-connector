<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CategoryAttr as CategoryAttrModel;

class CategoryAttr extends BaseMapper
{
    protected $mapperConfig = array(
       "mapPull" => array(
           "attributeI18ns" => "CategoryAttrI18n|addAttributeI18n",
       )
    );
    
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];        
        
        $categoryAttrTable = $this->getCategoryAttr($data);
        
        foreach ($categoryAttrTable as $value)
        {
            $categoryAttrModel = new CategoryAttrModel();  
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $categoryAttrModel->setId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXOBJECTID']);
            $categoryAttrModel->setCategoryId($identityModel);
            
            $categoryAttrModel->setSort(intval($value['OXSORT']));
            
            $return[] = $categoryAttrModel;
        }
        return $return;
    }
    
    public function getCategoryAttr($params)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxcategory2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxcategory2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxcategory2attribute.OXOBJECTID = '{$params['OXID']}'");
        
        die(print_r(" SELECT * FROM oxcategory2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxcategory2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxcategory2attribute.OXOBJECTID = '{$params['OXID']}'"));
        
        return $sqlResult;
    }    
}