<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\GlobalData\Warehouse;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalDataConf.inc.php");

class Warehouses {

    public $Warehouse = array();
    public $WarehouseI18n = array();

    /**
     * Ziehe Warenlager vom Oxid-Shop
     * @return type
     */
    public function getWarehouses() {
        $database = new Database\Database;
        
        //ToDO: Select Statement für Warenlager
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillWarehouseclasses($SQLResult);
    }
    
    /**
     * Füllt die Warenlager-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Warehouses
     */
    function fillWarehouseclasses($SQLResult) {
        $Warehouses = new Warehouses;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* Warehouse */
            $Warehouse = new Warehouse\Warehouse;
            //$Warehouse->setId($SQLResult[$i]['']);
            
            /* WarehouseI18n */
            $WarehouseI18n = new Warehouse\WarehouseI18n;
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
    public function setTaxs() {
        return Null;
    }
}
