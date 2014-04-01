<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerOrderContainer;

/**
 * Summary of CustomerOrderShippingAddress
 */
class CustomerOrderShippingAddress extends BaseMapper
{
    protected $_config = array
    (
     "model" => "\\jtl\\Connector\\Model\\CustomerOrderShippingAddress",
        "table" => "oxorder",
        "pk" => "OXID",
        "mapPull" => array(
            "_id" => "OXID",
            "_customerId" => "OXUSERID",
            "_salutation" => "OXDELSAL",
            "_firstName" => "OXDELFNAME",
            "_lastName" => "OXDELLNAME",
            "_company" => "OXDELCOMPANY",
            "_deliveryInstruction" => "OXDELADDINFO",
            "_street" => null,
            "_zipCode" => "OXDELZIP",
            "_city" => "OXDELCITY",
            "_state" => "OXDELSTATEID",
            "_countryIso" => "OXDELCOUNTRYID",
            "_phone" => "OXDELFON",
            "_fax" => "OXDELFAX"
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXUSERID" => "_customerId",
            "OXDELSAL" => "_salutation",
            "OXDELFNAME" => "_firstName",
            "OXDELLNAME" => "_lastName",
            "OXDELCOMPANY" => "_company",
            "OXDELADDINFO" => "_deliveryInstruction",
            "OXDELSTREET" => null,
            "OXDELSTREETNR" => null,
            "OXDELZIP" => "_zipCode",
            "OXDELCITY" => "_city",
            "OXDELSTATEID" => "_state",
            "OXDELCOUNTRYID" => "_countryIso",
            "OXDELFON" => "_phone",
            "OXDELFAX" => "_fax"
        )
    );
    
    public function _street($data) 
    {
    	return "{$data['OXDELSTREET']}  {$data['OXDELSTREETNR']}";
    }
    
    public function OXDELSTREET($data)
    {
        preg_match('/^[a-z ]*/i', $data['_street'], $result);
        return  $result[0];
    }
    
    public function OXDELSTREETNR($data)
    {
        preg_match('/[0-9].*/i', $data['_street'], $result);
        return  $result[0];
    }
}
/* non mapped properties
CustomerOrderShippingAddress:
_title
_extraAddressLine
_mobile
_eMail
 */