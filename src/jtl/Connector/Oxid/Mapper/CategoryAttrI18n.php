<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CategoryAttrI18n as CategoryAttrI18nModel;

class CategoryAttrI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $languages = $this->getLanguageIDs();
        $categoryAttrI18nTable = $this->getCategoryI18n($data);
        
        foreach ($categoryAttrI18nTable as $value)
        {
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                    if($language['baseId'] == 0)
                    {   
                        if($this->getLocalCode($language['code']))
                        {
                            if(!empty($value['OXTITLE']))
                            {
                                $categoryAttrI18nModel = new CategoryAttrI18nModel();
                                
                                $identityModel = new IdentityModel();
                                $identityModel->setEndpoint($value['OXID']);
                                $categoryAttrI18nModel->setCategoryAttrId($identityModel);

                                $categoryAttrI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $categoryAttrI18nModel->setValue($value['OXTITLE']);
                                
                                $return[] = $categoryAttrI18nModel;
                            }
                        }
                    }else{
                        if($this->getLocalCode($language['code']))
                        {
                            if(!empty($value["OXTITLE_{$langBaseId}"]))
                            {
                                $categoryAttrI18nModel = new CategoryAttrI18nModel();
                                
                                $identityModel = new IdentityModel();
                                $identityModel->setEndpoint($value['OXID']);
                                $categoryAttrI18nModel->setCategoryAttrId($identityModel);
                                
                                $categoryAttrI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $categoryAttrI18nModel->setValue($value["OXTITLE_{$langBaseId}"]);
                                
                                $return[] = $categoryAttrI18nModel;
                            }
                        }
                    }
                }   
            }
            return $return;
        }

    public function getCategoryAttrI18n($params)
    {   
        $sqlResult = $this->_db->query(" SELECT * FROM oxcategory2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxcategory2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxcategory2attribute.OXOBJECTID = '{$params['OXID']}';");
        return $sqlResult;
    }
}

/* non mapped properties
CategoryAttrI18n:
 * _key
 */