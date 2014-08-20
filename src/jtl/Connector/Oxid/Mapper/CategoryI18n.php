<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CategoryI18n as CategoryI18nModel;

class CategoryI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $languages = $this->getLanguageIDs();
        $categoryI18nTable = $this->getCategoryI18n($data);
        
        foreach ($categoryI18nTable as $value)
        {
            foreach ($languages as $language)
            {       
                $langBaseId = $language['baseId'];
                
                if($language['baseId'] == 0)
                {   
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']) or
                           !empty($value['OXLONGDESC']))
                        {
                            $categoryI18nModel = new CategoryI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryI18nModel->setCategoryId($identityModel);
                            
                            $categoryI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryI18nModel->setName($value['OXTITLE']);
                            $categoryI18nModel->setUrlPath($value['OXEXTLINK']);
                            $categoryI18nModel->setDescription($value['OXLONGDESC']);
                            
                            $return[] = $categoryI18nModel;
                        }    
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]))
                        {                          
                            $categoryI18nModel = new CategoryI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryI18nModel->setCategoryId($identityModel); 
                            
                            $categoryI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryI18nModel->setName($value["OXTITLE_{$langBaseId}"]);
                            $categoryI18nModel->setUrlPath($value["OXEXTLINK"]);
                            $categoryI18nModel->setDescription($value["OXLONGDESC_{$langBaseId}"]);
                            
                            $return[] = $categoryI18nModel;
                        }
                    }
                }
            }
        }
        return $return;
    }
    
    //public function push($data,$dbObj) {
    //    $return = [];
        
    //    foreach($data->getCategoryI18n() as $categoryI18n) {
    //        $categoryI18n = new CategoryI18nModel();
    //    }
    //}
    
    public function getCategoryI18n($params)
    {   
        $sqlResult = $this->db->query("SELECT * " .
                                        " FROM oxcategories " .
                                        " WHERE oxcategories.OXID = '{$params['OXID']}';");        
        return $sqlResult;
    }
}