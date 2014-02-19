<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\GlobalData\ProductType;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GGlobalDataConf.inc.php");

class ProductTypes {
    
    public $ProductType = array();

    /**
     * Ziehe Warengruppen vom Oxid-Shop
     * @return type
     */
    public function getProductTypes() {
        $database = new Database\Database;
       
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillProductTypeclasses($SQLResult);
    }
    
    /**
     * Füllt die Warengruppen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \ProductTypes
     */
    function fillProductTypeclasses($SQLResult) {
        $ProductTypes = new ProductTypes;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {

            /* ProductType */
            $ProductType = new ProductType\ProductType;
            //$ProductType->setId($SQLResult[$i]['']);
            //$ProductType->setName($SQLResult[$i]['']);
            
            
            $ProductTypes->ProductType[$i] = $ProductType;
        }

        return $ProductTypes;
    }

    /**
     * Schreibe Warengruppen in Oxid-Shop
     * @return null
     */
    public function setProductTypes() {
        return Null;
    }
}

