<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of Company
 */
class Company extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Company",
            "table" => "oxshops",
            "pk" => "OXID",
            "mapPull" => array(
                "_name" => "OXCOMPANY",
                "_street" => "OXSTREET",
                "_zipCode" => "OXZIP",
                "_city" => "OXCITY",
                "_countryIso" => "OXCOUNTRY",
                "_phone" => "OXTELEFON",
                "_fax" => "OXTELEFAX",
                "_eMail" => "OXINFOEMAIL",
                "_www" => "OXURL",
                "_bankCode" => "OXBANKCODE",
                "_accountNumber" => "OXBANKNUMBER",
                "_bankName" => "OXBANKNAME",
                "_vatNumber" => "OXVATNUMBER",
                "_iban" => "OXIBANNUMBER",
                "_bic" => "OXBICCODE"
            ),
            "mapPush" => array(
                "OXCOMPANY" => "_name",
                "OXSTREET" => "_street",
                "OXZIP" => "_zipCode",
                "OXCITY" => "_city",
                "OXCOUNTRY" => "_countryIso",
                "OXTELEFON" => "_phone",
                "OXTELEFAX" => "_fax",
                "OXINFOEMAIL" => "_eMail",
                "OXURL" => "_www",
                "OXBANKCODE" => "_bankCode",
                "OXBANKNUMBER" => "_accountNumber",
                "OXBANKNAME" => "_bankName",
                "OXVATNUMBER" => "_vatNumber",
                "OXIBANNUMBER" => "_iban",
                "OXBICCODE" => "_bic"           
            )
        );
}
/* non mapped properties
Company:
_businessman
_accountHolder
 */