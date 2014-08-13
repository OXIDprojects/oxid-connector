<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Model\Currency as CurrencyModel;
use jtl\Connector\Model\Identity as IdentityModel;

class Currency extends BaseMapper
{      
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $currencyTable = $this->getCurrency();
        
        for ($i = 0; $i < count($currencyTable); $i++)
        {
            $currency = new CurrencyModel();
            
            if($i == 0)
            {
                $currency->setIsDefault(true);
            }
            
            $identity = new IdentityModel();
            $identity->setEndpoint($currencyTable[$i]['id']);
            $currency->setId($identity);
            
            $currency->setName($currencyTable[$i]['name']);
            $currency->setNameHtml($currencyTable[$i]['symbol']);
            $currency->setFactor((double)$currencyTable[$i]['rate']);
            $currency->setDelimiterCent($currencyTable[$i]['decimal_separator']);
            $currency->setDelimiterThousand($currencyTable[$i]['thousand_separator']);
            
            $return[] = $currency;
        }
        return $return;
    }
    
    public function getCurrency()
    {   
        $oxidConf = new Config();
        
        $sqlResult = $this->db->query("SELECT DECODE(OXVARVALUE, '{$oxidConf->sConfigKey}') AS OXVARVALUEDECODED FROM oxconfig " .
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