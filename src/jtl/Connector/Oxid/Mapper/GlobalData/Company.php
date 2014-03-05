<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

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
                "_businessman" => null,
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
                "_accountHolder" => null,
                "_vatNumber" => "OXVATNUMBER",
                "_iban" => "OXIBANNUMBER",
                "_bic" => "OXBICCODE"
            )
        );
}
