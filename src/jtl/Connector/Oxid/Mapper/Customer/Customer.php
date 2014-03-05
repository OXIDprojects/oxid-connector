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
            "_customerGroupId" => "0",
            "_customerNumber" => "OXCUSTNR",
            "_salutation" => "OXSAL",
            "_firstName" => "OXFNAME",
            "_lastName" => "OXLNAME",
            "_company" => "OXCOMPANY",
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
            "_birthday" => "OXBIRTHDATE",
            "_created" => "OXCREATE",
            "_IsActive" => "OXACTIVE"
        )
    );
}