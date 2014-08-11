<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Model\GlobalData as GlobalDataModel;

class GlobalData extends BaseMapper
{
    protected $mapperConfig = array(
        "mapPull" => array(
            "languages" => "Language|addLanguage",
            //"customerGroups" => "CustomerGroup|addCustomerGroup",
            //"taxRates" => "TaxRate|addTaxRate",
            //"currencies" => "Currency|addCurrency",
            //"units" => "Unit|addUnit"
         )
    );
    
    public function pull($data = null, $offset = 0, $limit = null) {
        $globalData = $this->generateModel(null);
        
        return $globalData;
    }
}