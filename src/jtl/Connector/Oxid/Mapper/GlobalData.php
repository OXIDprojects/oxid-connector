<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
//use jtl\Connector\Model\GlobalData as GlobalDataModel;

class GlobalData extends BaseMapper
{
    protected $mapperConfig = array(
        "mapPull" => array(
            //"languages" => "Language|addLanguage",
            //"customerGroups" => "CustomerGroup|addCustomerGroup",
            "taxRates" => "TaxRate|addTaxRate",
            //"shippingClasses" => "ShippingClass|addShippingClass",
            "currencies" => "Currency|addCurrency",
            //"crossSellings" => "CrossSelling|addCrossSelling",
            //"units" => "Unit|addUnit",
            //"companies" => "Company|addCompany"
         )
    );
    
    public function pull($data=null, $offset=0, $limit=null) {
        $globalData = $this->generateModel(null);
        
        return [$globalData];
    }
}