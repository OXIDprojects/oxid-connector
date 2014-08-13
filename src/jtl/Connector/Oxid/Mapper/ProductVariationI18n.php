<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariationI18n as ProductVariationI18nModel;

class ProductVariationI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $languages = $this->getLanguageIDs();
        $productVariationI18nTable = $this->getProductVariationI18n($data);
        
        foreach ($productVariationI18nTable as $value)
        {              
            $productVariationI18nModel = new ProductVariationI18nModel();
            
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                    
                if($language['baseId'] == 0)
                {   
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXVARNAME']))
                        {
                            $variantIDs = array_map('trim', split('\|', $value['OXVARNAME']));
                                
                            foreach ($variantIDs as $variantID)
                            {
                                $identity = new IdentityModel;
                                $identity->setEndpoint(md5($variantID));
                                $productVariationI18nModel->setProductVariationId($identity);
                                    
                                $productVariationI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $productVariationI18nModel->setName($variantID);
                                    
                                $return[] = $productVariationI18nModel;
                            }
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXVARNAME_{$langBaseId}"]))
                        {
                            $variantIDs = array_map('trim', split('\|', $value["OXVARNAME"]));
                            $variantLangIDs = array_map('trim', split('\|', $value["OXVARNAME_{$langBaseId}"]));
                            
                            for ($i = 0; $i < count($variantIDs); $i++)
                            {
                                $identity = new IdentityModel;
                                $identity->setEndpoint(md5($variantIDs[$i]));
                                $productVariationI18nModel->setProductVariationId($identity);
                                
                                $productVariationI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $productVariationI18nModel->setName($variantLangIDs[$i]);
                                
                                $return[] = $productVariationI18nModel;
                            }
                        }
                    }
                }
                return $return;
            }                
            
        }
    }
    
    public function getProductVariationI18n($param)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxarticles " .
                                       " WHERE OXID = '{$param['OXID']}' ");
        
        return $sqlResult;
    }
}