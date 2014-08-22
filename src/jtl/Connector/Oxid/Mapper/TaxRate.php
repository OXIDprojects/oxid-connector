<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Model\TaxRate as TaxRateModel;
use jtl\Connector\Model\Identity as IdentityModel;

class TaxRate extends BaseMapper
{      
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $taxRateTable = $this->getTaxRate();
        
        foreach ($taxRateTable as $value)
        {
            $taxRate = new TaxRateModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $taxRate->setId($identityModel);
            $taxRate->setRate((double)$value['OXVARVALUEDECODED']);
            
            $return[] = $taxRate;
        }
        return $return;
    }
    
    public function getTaxRate()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->db->query("SELECT *, DECODE(OXVARVALUE, '{$oxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                                       " WHERE OXVARNAME = 'dDefaultVAT'");
        
        return $sqlResult;
    }
}