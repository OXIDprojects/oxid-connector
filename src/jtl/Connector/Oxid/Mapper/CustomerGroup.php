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
                    "isDefault" => null
                ),
                "mapPush" => array(
                    "OXID" => "_id"
                )
            );
    
    public function isDefault($data) {
        if ($data['OXID'] == $this->getDefaultCustomerGroupId()) {
            return true;
        } else {
            return false;
        }
    }
}