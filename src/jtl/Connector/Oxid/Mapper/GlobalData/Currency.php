<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\Currency as CurrencyModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of Currency
 */
class Currency extends BaseMapper
{      
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $currency = new CurrencyModel();
        $identity = new IdentityModel();
        
        for ($i = 0; $i < count($params); $i++)
        {
            if($i == 0)
            {
                $currency->_isDefault = True;
            }
            
            $identity->setEndpoint($params[$i]['id']);
            $currency->_id = $identity;
            $currency->_name = $params[$i]['name'];
            $currency->_nameHtml = $params[$i]['symbol'];
            $currency->_factor = $params[$i]['rate'];
            $currency->_delimiterCent = $params[$i]['decimal_separator'];
            $currency->_delimiterThousand = $params[$i]['thousand_separator'];
            
            $container->add('currency', $currency->getPublic(), false);
        }
        
    }
    
    /**
     * Summary of getCurrency
     * @return Array
     */
    public function getCurrency()
    {   
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT DECODE(OXVARVALUE, '{$oxidConf->sConfigKey}') AS OXVARVALUEDECODED FROM oxconfig " .
                                   "WHERE OXVARNAME = 'aCurrencies' ");
        
        $currencyArr = unserialize($sqlResult[0]['OXVARVALUEDECODED']);       
        
        for ($i = 0; $i < Count($currencyArr); $i++)
        {
            //Splite Currency Informationen in ein Array
            $currencyResult[$i] = explode("@", $currencyArr[$i]);
            $currencyResult[$i][] = $i;
            
            //Vergebe neue Key Parameter
            foreach ($currencyResult[$i] as $k => $v) {
                unset ($currencyResult[$i][$k]);

                switch ($k)
                {
                    case 0:
                        $new_key = "name";
                        break;
                    case 1:
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

                $currencyResult[$i][$new_key] = $v;
            } 
        }
        
        return $currencyResult;
    }
}

/* non mapped properties
Currency:
 * _iso
 * _hasCurrencySignBeforeValue
 */