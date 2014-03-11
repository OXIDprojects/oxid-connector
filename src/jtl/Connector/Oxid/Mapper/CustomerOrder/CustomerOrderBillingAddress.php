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
            "_eMail" => "OXBILLEMAIL",
        )
    );
    
    public function _street($data) {
    	return "{$data['OXBILLSTREET']}  {$data['OXBILLSTREETNR']}";
    }
}
/* non mapped properties
CustomerOrderBillingAddress:
_title
_extraAddressLine
_mobile



 */