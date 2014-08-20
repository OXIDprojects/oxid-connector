<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class CustomerOrderBillingAddress extends BaseMapper
{
    protected $mapperConfig = array(
        "table" => "oxorder",
        "mapPull" => array(
            "id" => "OXID",
            "customerId" => "OXUSERID",
            "salutation" => "OXBILLSAL",
            "firstName" => "OXBILLFNAME",
            "lastName" => "OXBILLLNAME",
            "company" => "OXBILLCOMPANY",
            "deliveryInstruction" => "OXBILLADDINFO",
            "street" => null,
            "extraAddressLine" => "OXBILLCITY",
            "zipCode" => "OXBILLZIP",
            "city" => "OXBILLCITY",
            "state" => "OXBILLSTATEID",
            "countryIso" => "OXBILLCOUNTRYID",
            "phone" => "OXBILLFON",
            "fax" => "OXBILLFAX",
            "eMail" => "OXBILLEMAIL"
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXUSERID" => "_customerId",
            "OXBILLSAL" => "_salutation",
            "OXBILLFNAME" => "_firstName",
            "OXBILLLNAME" => "_lastName",
            "OXBILLCOMPANY" => "_company",
            "OXBILLADDINFO" => "_deliveryInstruction",
            "OXBILLSTREET" => null,
            "OXBILLSTREETNR" => null,
            "OXBILLZIP" => "_zipCode",
            "OXBILLCITY" => "_city",
            "OXBILLSTATEID" => "_state",
            "OXBILLCOUNTRYID" => "_countryIso",
            "OXBILLFON" => "_phone",
            "OXBILLFAX" => "_fax",
            "OXBILLEMAIL" => "_eMail"
        )
    );
    
    public function pull($data=null, $offset=0, $limit=null) {
        return array($this->generateModel($data));
    }
    
    public function street($data) 
    {
    	return "{$data['OXBILLSTREET']}  {$data['OXBILLSTREETNR']}";
    }
    
    public function OXBILLSTREET($data)
    {
        preg_match('/^[a-z ]*/i', $data['_street'], $result);
        return  $result[0];
    }
    
    public function OXBILLSTREETNR($data)
    {
        preg_match('/[0-9].*/i', $data['_street'], $result);
        return  $result[0];
    }
}