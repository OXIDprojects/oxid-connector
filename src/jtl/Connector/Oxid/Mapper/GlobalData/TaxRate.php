<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Model\TaxRate as TaxRateModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\Identity as IdentityModel;


/**
 * Summary of TaxRate
 */
class TaxRate extends BaseMapper
{      
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $taxRate = new TaxRateModel();
        
        foreach ($params as $value)
        {
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $taxRate->setId($identityModel);
            $taxRate->setRate($value['OXVARVALUEDECODED']);
            
            $container->add('tax_rate', $taxRate->getPublic(), false);
        }
    }
    
    /**
     * Summary of getTaxRate
     * @return Array
     */
    public function getTaxRate()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT *, DECODE(OXVARVALUE, '{$oxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                                       " WHERE OXVARNAME = 'dDefaultVAT';");
        
        return $sqlResult;
    }
}
/* non mapped properties
TaxRate:
 * _taxZoneId
 * _taxClassId
 * _priority
 */