<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\classes\GlobalData\CustomerGroup;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalDataConf.inc.php");

class CustomerGroups
{

    public $CustomerGroup = array();
    public $CustomerGroupAttr = array();
    public $CustomerGroupI18n = array();

    /**
     * Ziehe Kundengruppen vom Oxid-Shop
     * @return type
     */
    public function getCustomerGroups()
	{
        $database = new Database\Database;

        //ToDO: Select Statement für Kundengruppen
        $query = "SELECT * FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCustomerGroupclasses($SQLResult);
    }

    /**
     * Füllt die Kundengruppen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerGroups
     */
    function fillCustomerGroupclasses($SQLResult)
	{
        $CustomerGroups = new CustomerGroups;

        for ($i = 0; $i < count($SQLResult); ++$i)
		{

            /* CustomerGroup */
            $CustomerGroup = new CustomerGroup\CustomerGroup;
            //$CustomerGroup->setId($SQLResult[$i]['']);
            //$CustomerGroup->setDiscount($SQLResult[$i]['']);
            //$CustomerGroup->setIsDefault($SQLResult[$i]['']);
            //$CustomerGroup->setApplyNetPrice($SQLResult[$i]['']);

            /* CustomerGroupAttr */
            $CustomerGroupAttr = new CustomerGroup\CustomerGroupAttr;
            //$CustomerGroupAttr->setLocaleName($SQLResult[$i]['']);
            //$CustomerGroupAttr->setCustomerGroupId($SQLResult[$i]['']);
            //$CustomerGroupAttr->setName($SQLResult[$i]['']);

            /* CustomerGroupI18n */
            $CustomerGroupI18n = new CustomerGroup\CustomerGroupI18n;
            //$CustomerGroupI18n->setId($SQLResult[$i][''])
            //$CustomerGroupI18n->setCustomerGroupId($SQLResult[$i]['']);
            //$CustomerGroupI18n->setKey($SQLResult[$i]['']);
            //$CustomerGroupI18n->setValue($SQLResult[$i]['']);

            $CustomerGroups->CustomerGroup[$i] = $CustomerGroup;
            $CustomerGroups->CustomerGroupAttr[$i] = $CustomerGroupAttr;
            $CustomerGroups->CustomerGroupI18n[$i] = $CustomerGroupI18n;
        }

        return $CustomerGroups;
    }

    /**
     * Schreibe Kundengruppen in Oxid-Shop
     * @return null
     */
    public function setCustomerGroups()
	{
        return Null;
    }
}
