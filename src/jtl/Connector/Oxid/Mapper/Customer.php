<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\Customer as CustomerModel;

class Customer extends \jtl\Connector\Oxid\Mapper\BaseMapper
{   
    protected $mapperConfig = array
    (
        "table" => "oxuser",
        "query" => "SELECT oxuser.*, oxnewssubscribed.OXDBOPTIN  FROM oxuser, oxnewssubscribed WHERE oxnewssubscribed.OXUSERID = oxuser.OXID ORDER BY oxuser.OXID",
        "mapPull" => array(
            "id" => "OXID",
            "customerNumber" => "OXCUSTNR",
            "salutation" => "OXSAL",
            "firstName" => "OXFNAME",
            "lastName" => "OXLNAME",
            "company" => "OXCOMPANY",
            "street" => null,
            "deliveryInstruction" => "OXADDINFO",
            "zipCode" => "OXZIP",
            "city" => "OXCITY",
            "state" => "OXSTATEID",
            "phone" => "OXPRIVFON",
            "mobile" => "OXMOBFON",
            "fax" => "OXFAX",
            "eMail" => "OXUSERNAME",
            "vatNumber" => "OXUSTID",
            "www" => "OXURL",
            "hasNewsletterSubscription" => "OXDBOPTIN",
            "birthday" => null,
            "created" => null,
            "modified" => null,
            "isActive" => "OXACTIVE"
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
    
    public function street($data)
    {
        return "{$data['OXSTREET']}  {$data['OXSTREETNR']}";
    }
    
    public function birthday($data)
    {
        return $this->stringToDateTime($data['OXBIRTHDATE']);
    }
    
    public function created($data)
    {
        return $this->stringToDateTime($data['OXCREATE']);
    }
    
    public function modified($data)
    {
        return $this->stringToDateTime($data['OXTIMESTAMP']);
    }
    
    public function OXSTREET($data)
    {       
        preg_match('/^[a-z ]*/i', $data->_street, $result);
        return  $result[0];
    }
    
    public function OXSTREETNR($data)
    {
        preg_match('/[0-9].*/i', $data->_street, $result);
        return  $result[0];
    }
}