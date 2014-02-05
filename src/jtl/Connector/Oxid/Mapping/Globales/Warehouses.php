<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals\Warehouse;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");

Class Warehouses {

    public $Warehouse = array();
    public $WarehouseI18n = array();

    /**
     * Ziehe Warenlager vom Oxid-Shop
     * @return type
     */
    Public Function getWarehouses() {
        $database = New Database\Database;
        
        //ToDO: Select Statement für Warenlager
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillWarehouseClasses($SQLResult);
    }
    
    /**
     * Füllt die Warenlager-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Warehouses
     */
    Function fillWarehouseClasses($SQLResult) {
        $Warehouses = New Warehouses;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* Warehouse */
            $Warehouse = New Warehouse\Warehouse;
            //$Warehouse->setId($SQLResult[$i]['']);
            
            /* WarehouseI18n */
            $WarehouseI18n = New Warehouse\WarehouseI18n;
            //$WarehouseI18n->setWarehouseId($SQLResult[$i]['']);
            //$WarehouseI18n->setName($SQLResult[$i]['']);
                       
            $Warehouses->Warehouse[$i] = $Warehouse;
            $Warehouses->WarehouseI18n[$i] = $WarehouseI18n;
        }

        return $Warehouses;
    }

    /**
     * Schreibe Warenlager in Oxid-Shop
     * @return null
     */
    Public Function setTaxs() {
        return Null;
    }
}
?>