<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductI18n as ProductI18nModel;

class ProductI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {   
        $return = [];       
        $languages = $this->getLanguageIDs();
        $productI18nTable = $this->getProductI18n($data);
        
        foreach ($productI18nTable as $value)
        {
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if($this->getLocalCode($language['code']))
                {
                    if($language['baseId'] == 0)
                    {
                        $productI18nModel = new ProductI18nModel();

                        $identityModel = new IdentityModel();
                        $identityModel->setEndpoint($value['OXID']);
                        $productI18nModel->setProductId($identityModel);
                            
                        $productI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $productI18nModel->setName($value['OXTITLE']);
                        $productI18nModel->setUrlPath($value['OXEXTURL']);
                        $productI18nModel->setDescription($value['OXLONGDESC']);
                        $productI18nModel->setShortDescription($value['OXSHORTDESC']);
                            
                        $return[] = $productI18nModel;
                    }else{
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXURLDESC_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]) or
                           !empty($value["OXSHORTDESC_{$langBaseId}"]))
                        {
                            $productI18nModel = new ProductI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $productI18nModel->setProductId($identityModel);
                            
                            $productI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $productI18nModel->setName($value["OXTITLE_{$langBaseId}"]);
                            $productI18nModel->setUrlPath($value["OXURLDESC_{$langBaseId}"]);
                            $productI18nModel->setDescription($value["OXLONGDESC_{$langBaseId}"]);
                            $productI18nModel->setShortDescription($value["OXSHORTDESC_{$langBaseId}"]);
                            
                            $return[] = $productI18nModel;
                        }
                    }
                }
            }   
        }
        return $return;
    }
    
    public function getProductI18n($param)
    {      
        $sqlResult = $this->db->query("SELECT oxarticles.*, oxartextends.*" .
                                      " FROM oxarticles" .
                                      " LEFT JOIN oxartextends" .
                                      " ON oxarticles.OXID = oxartextends.OXID " .
                                      " WHERE oxarticles.OXID = '{$param['OXID']}'");
        
        return $sqlResult;
    }
}