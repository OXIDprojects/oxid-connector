<?php
namespace jtl\Connector\Oxid\Mapper\Manufacturer;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ManufacturerContainer;
use jtl\Connector\Model\ManufacturerI18n as ManufacturerI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of ManufacturerI18n
 */
class ManufacturerI18n extends BaseMapper
{
    protected $_config = array(
        "mapPush" => array(
            "language_id" => null,
            "manufacturer_id" => "_productId",
            "products_name" => "_name",
            "products_url" => "_urlPath",
            "products_description" => "_description",
            "products_short_description" => "_shortDescription"
        )
    );
        
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $manufacturerI18nModel = new ManufacturerI18nModel();       
        $languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
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
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $manufacturerI18nModel->setManufacturerId($identityModel);
                            
                            $manufacturerI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $manufacturerI18nModel->setDescription($value['OXSHORTDESC']);
                            $manufacturerI18nModel->setTitleTag($value['OXTITLE']);
                            
                            $container->add('manufacturer_i18n', $manufacturerI18nModel->getPublic(), false);
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXSHORTDESC_{$langBaseId}"]))
                        {
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $manufacturerI18nModel->setManufacturerId($identityModel);
                            
                            $manufacturerI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $manufacturerI18nModel->setDescription($value["OXSHORTDESC_{$langBaseId}"]);
                            $manufacturerI18nModel->setTitleTag($value["OXTITLE_{$langBaseId}"]);
                            
                            $container->add('manufacturer_i18n', $manufacturerI18nModel->getPublic(), false);
                        }
                    }
                }
            }   
        }
    }
    
    public function updateAll($container,$manufacturerId=null) {          
        foreach($container->get('manufacturer_I18n') as $manufacturerI18n) {
            $obj = $this->mapDB($manufacturerI18n);
            
            if(empty($obj->manufacturer_id)) $obj->manufacturer_id = $manufacturerId;
                       
            $this->_db->deleteInsertRow($obj, $this->_config['table'],array('products_id','Language_id'), array($obj->manufacturer_id.$obj->language_id));
        }
        
        return true;
    } 
    
    public function getManufacturerI18n($params)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * " .
                                        " FROM oxmanufacturers " .
                                        " WHERE oxmanufacturers.OXID = '{$params['OXID']}';");
        return $sqlResult;
    }
}

/* non mapped properties
ManufacturerI18n:
 * _metaDescription 
 * _metaKeywords
*/