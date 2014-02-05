<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals\CustomerGroup;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");

Class CustomerGroups {

    public $CustomerGroup = array();
    public $CustomerGroupAttr = array();
    public $CustomerGroupI18n = array();

    /**
     * Ziehe Kundengruppen vom Oxid-Shop
     * @return type
     */
    Public Function getCustomerGroups() {
        $database = New Database\Database;
        
        //ToDO: Select Statement für Kundengruppen
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillCustomerGroupClasses($SQLResult);
    }
    
    /**
     * Füllt die Kundengruppen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerGroups
     */
    Function fillCustomerGroupClasses($SQLResult) {
        $CustomerGroups = New CustomerGroups;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {
             
            /* CustomerGroup */
            $CustomerGroup = New CustomerGroup\CustomerGroup;
            //$CustomerGroup->setId($SQLResult[$i]['']);
            //$CustomerGroup->setDiscount($SQLResult[$i]['']);
            //$CustomerGroup->setIsDefault($SQLResult[$i]['']);
            //$CustomerGroup->setApplyNetPrice($SQLResult[$i]['']);
            
            /* CustomerGroupAttr */
            $CustomerGroupAttr = New CustomerGroup\CustomerGroupAttr;
            //$CustomerGroupAttr->setLocaleName($SQLResult[$i]['']);
            //$CustomerGroupAttr->setCustomerGroupId($SQLResult[$i]['']);
            //$CustomerGroupAttr->setName($SQLResult[$i]['']);
            
            /* CustomerGroupI18n */
            $CustomerGroupI18n = New CustomerGroup\CustomerGroupI18n;
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
    Public Function setCustomerGroups() {
        return Null;
    }
}
?>