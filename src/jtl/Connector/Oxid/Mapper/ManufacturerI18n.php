<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\ManufacturerI18n as ManufacturerI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

class ManufacturerI18n extends BaseMapper
{
    protected $mapperConfig = array
    (
        "mapPush" => array(
            "language_id" => null,
            "manufacturer_id" => "_productId",
            "products_name" => "_name",
            "products_url" => "_urlPath",
            "products_description" => "_description",
            "products_short_description" => "_shortDescription"
        )
    );
        
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];              
        $languages = $this->getLanguageIDs();
        $manufacturerI18nTable = $this->getManufacturerI18n($data);
        
        foreach ($manufacturerI18nTable as $value)
        {
            //Pro Sprache
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if($language['baseId'] == 0)
                {   
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']) or
                           !empty($value['OXSHORTDESC']))
                        {
                            $manufacturerI18nModel = new ManufacturerI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $manufacturerI18nModel->setManufacturerId($identityModel);
                            
                            $manufacturerI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $manufacturerI18nModel->setDescription($value['OXSHORTDESC']);
                            $manufacturerI18nModel->setTitleTag($value['OXTITLE']);
                            
                            $return[] = $manufacturerI18nModel;
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXSHORTDESC_{$langBaseId}"]))
                        {
                            $manufacturerI18nModel = new ManufacturerI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $manufacturerI18nModel->setManufacturerId($identityModel);
                            
                            $manufacturerI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $manufacturerI18nModel->setDescription($value["OXSHORTDESC_{$langBaseId}"]);
                            $manufacturerI18nModel->setTitleTag($value["OXTITLE_{$langBaseId}"]);
                            
                            $return[] = $manufacturerI18nModel;
                        }
                    }
                }
            }   
        }
        return $return;
    }
    
    public function getManufacturerI18n($params)
    {   
        $sqlResult = $this->db->query("SELECT * " .
                                        " FROM oxmanufacturers " .
                                        " WHERE oxmanufacturers.OXID = '{$params['OXID']}';");
        return $sqlResult;
    }
}