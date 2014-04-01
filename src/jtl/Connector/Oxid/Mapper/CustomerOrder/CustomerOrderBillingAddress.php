<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Core\Utilities\ClassName as ClassNameUtility;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerOrderContainer;

/**
 * Summary of CustomerOrderBillingAddress
 */
class CustomerOrderBillingAddress extends BaseMapper
{
    protected $_config = array
    (
     "model" => "\\jtl\\Connector\\Model\\CustomerOrderBillingAddress",
        "table" => "oxorder",
        "mapPull" => array(
            "_id" => "OXID",
            "_customerId" => "OXUSERID",
            "_salutation" => "OXBILLSAL",
            "_firstName" => "OXBILLFNAME",
            "_lastName" => "OXBILLLNAME",
            "_company" => "OXBILLCOMPANY",
            "_deliveryInstruction" => "OXBILLADDINFO",
            "_street" => null,
            "_zipCode" => "OXBILLZIP",
            "_city" => "OXBILLCITY",
            "_state" => "OXBILLSTATEID",
            "_countryIso" => "OXBILLCOUNTRYID",
            "_phone" => "OXBILLFON",
            "_fax" => "OXBILLFAX",
            "_eMail" => "OXBILLEMAIL"
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
    
    public function _street($data) 
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
/* non mapped properties
CustomerOrderBillingAddress:
_title
_extraAddressLine
_mobile
 */