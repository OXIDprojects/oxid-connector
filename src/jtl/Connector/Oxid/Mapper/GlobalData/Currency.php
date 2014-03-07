<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\Currency AS CurrencyModel;

/**
 * Summary of Currency
 */
class Currency extends BaseMapper
{
    protected $_config = array
     (
         //"model" => "\\jtl\\Connector\\Model\\Currency",
         //"table" => "oxconfig",
         //"mapPull" => array(
         //   "_id" => "id",
         //   "_name" => "name",
         //   "_nameHtml" => "symbol",
         //   "_factor" => "rate",
         //   "_delimiterCent" => "decimal_separator"
         //   "_delimiterThousand" => "thousand_separator",
         //)
     );   
    
    
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $currency = new CurrencyModel();
        
        //echo "<pre>";
        //die(print_r($params[2]));
        
        foreach ($params as $value)
        {
            $currency->_id = $value['id'];
            $currency->_name = $value['name'];
            $currency->_nameHtml = $value['symbol'];
            $currency->_factor = $value['rate'];
            $currency->_delimiterCent = $value['decimal_separator'];
            $currency->_delimiterThousand = $value['thousand_separator'];
            
            $container->add('currency', $currency->getPublic(array('_fields')));
        }
        
        
    }
    
    //private function addAttributes($container,$data) {    	
    //    foreach($this->_attributes as $jtl => $oxid) {
    //        if(!empty($data[$oxid])) {
    //            $currency = new CurrencyModel();
                
    //            $attrI18n->_localeName = $this->_localeName($data);
    //            $attrI18n->_productAttrId = $jtl.'_'.$data['products_id'];
    //            $attrI18n->_key = $jtl;
    //            $attrI18n->_value = $data[$oxid];
                
    //            $container->add('product_attr_i18n', $attrI18n->getPublic(array('_fields')));
    //        }
    //    }   
    //}
    
    /**
     * Summary of getCurrency
     * @return Array
     */
    public function getCurrency()
    {   
        $OxidConf = new Config();
        
        $SQLResult = $this->_db->query("SELECT DECODE(OXVARVALUE, '{$OxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                                   "WHERE OXVARNAME = 'aCurrencies' ");
        
        $currencyArr = unserialize($SQLResult[0]['OXVARVALUEDECODED']);       
        
        for ($i = 0; $i < Count($currencyArr); $i++)
        {
            //Splite Currency Informationen in ein Array
            $CurrencyResult[$i] = explode("@", $currencyArr[$i]);
            $CurrencyResult[$i][] = $i;
            
            //Vergebe neue Key Parameter
            foreach ($CurrencyResult[$i] as $k => $v) {
                unset ($CurrencyResult[$i][$k]);

                switch ($k)
                {
                    case "0":
                        $new_key = "name";
                        break;
                    case "1":
                        $new_key = "rate";
                        break;
                    case 2:
                        $new_key = "decimal_separator";
                        break;
                    case 3:
                        $new_key = "thousand_separator";
                        break;
                    case 4:
                        $new_key = "symbol";
                        break;
                    case 5:
                        $new_key = "decimal_precision";
                        break;
                    case 6:
                        $new_key = "id";
                        break;
                }    

                $CurrencyResult[$i][$new_key] = $v;
            } 
        }
        
        return $CurrencyResult;
    }
}