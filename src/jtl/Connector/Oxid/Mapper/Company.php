<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Company extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxshops",
            "pk" => "OXID",
            "mapPull" => array(
                "name" => "OXCOMPANY",
                "street" => "OXSTREET",
                "zipCode" => "OXZIP",
                "city" => "OXCITY",
                "countryIso" => "OXCOUNTRY",
                "phone" => "OXTELEFON",
                "fax" => "OXTELEFAX",
                "eMail" => "OXINFOEMAIL",
                "www" => "OXURL",
                "bankCode" => "OXBANKCODE",
                "accountNumber" => "OXBANKNUMBER",
                "bankName" => "OXBANKNAME",
                "vatNumber" => "OXVATNUMBER",
                "iban" => "OXIBANNUMBER",
                "bic" => "OXBICCODE"
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