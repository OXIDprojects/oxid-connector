<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class CustomerGroup extends BaseMapper
{
    protected $mapperConfig = array
            (
                "table" => "oxgroups",
                "pk" => "OXID",
                "mapPull" => array(
                    "id" => "OXID",
                    "isDefault" => null,
                    "i18ns" => "CustomerGroupI18n|addI18n"
                ),
                "mapPush" => array(
                    "OXID" => "_id",
                )
            );
    
    public function discount($data) {
        /* OXID CustomerGroup discounts can not be
         * displayed in the JTL-Wawi
         */
        return null;
    }
    
    public function isDefault($data) {
        if ($data['OXID'] == $this->getDefaultCustomerGroupId()) {
            return true;
        } else {
            return false;
        }
    }
}