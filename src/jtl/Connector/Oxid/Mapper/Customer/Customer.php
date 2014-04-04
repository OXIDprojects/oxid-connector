<?php
namespace jtl\Connector\Oxid\Mapper\Customer;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerContainer;

/**
 * Summary of Customer
 */
class Customer extends BaseMapper
{
    protected $_config = array
    (
        "model" => "\\jtl\\Connector\\Model\\Customer",
        "table" => "oxuser",
        "mapPull" => array(
            "_id" => "OXID",
            "_customerNumber" => "OXCUSTNR",
            "_salutation" => "OXSAL",
            "_firstName" => "OXFNAME",
            "_lastName" => "OXLNAME",
            "_company" => "OXCOMPANY",
            "_street" => null,
            "_deliveryInstruction" => "OXADDINFO",
            "_zipCode" => "OXZIP",
            "_city" => "OXCITY",
            "_state" => "OXSTATEID",
            "_phone" => "OXPRIVFON",
            "_mobile" => "OXMOBFON",
            "_fax" => "OXFAX",
            "_eMail" => "OXUSERNAME",
            "_vatNumber" => "OXUSTID",
            "_www" => "OXURL",
            "_hasNewsletterSubscription" => "OXDBOPTIN",
            "_birthday" => null,
            "_created" => null,
            "_modified" => null,
            "_IsActive" => "OXACTIVE"
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXCUSTNR" => "_customerNumber",
            "OXSAL" => "_salutation",
            "OXFNAME" => "_firstName",
            "OXLNAME" => "_lastName",
            "OXCOMPANY" => "_company",
            "OXSTREET" => null,
            "OXSTREETNR" => null,
            "OXADDINFO" => "_deliveryInstruction",
            "OXZIP" => "_zipCode",
            "OXCITY" => "_city",
            "OXSTATEID" => "_state",
            "OXPRIVFON" => "_phone",
            "OXMOBFON" => "_mobile",
            "OXFAX" => "_fax",
            "OXUSERNAME" => "_eMail",
            "OXUSTID" => "_vatNumber",
            "OXURL" => "_www",
            "OXDBOPTIN" => "_hasNewsletterSubscription",
            "OXBIRTHDATE" => "_birthday",
            "OXCREATE" => "_created",
            "OXTIMESTAMP" => "_modified",
            "OXACTIVE" => "_IsActive"
        )
    );
    
    //ToDO!
    public function _street($data)
    {
    	return "{$data['OXSTREET']}  {$data['OXSTREETNR']}";
    }
    
    public function _birthday($data)
    {
        return $this->stringToDateTime($data['OXBIRTHDATE']);
    }
    
    public function _created($data)
    {
        return $this->stringToDateTime($data['OXCREATE']);
    }
    
    public function _modified($data)
    {
        return $this->stringToDateTime($data['OXTIMESTAMP']);
    }
    
    public function OXSTREET($data)
    {
        preg_match('/^[a-z ]*/i', $data['_street'], $result);
        return  $result[0];
    }
    
    public function OXSTREETNR($data)
    {
        preg_match('/[0-9].*/i', $data['_street'], $result);
        return  $result[0];
    }
}
/* non mapped properties
Customer:
_customerGroupId
_title
_extraAddressLine
_countryIso
_accountCredit
_discount
_origin
_isFetched
_hasCustomerAccount
 */