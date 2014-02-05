<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals\ProductType;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");

Class ProductTypes {
    
    public $ProductType = array();

    /**
     * Ziehe Warengruppen vom Oxid-Shop
     * @return type
     */
    Public Function getProductTypes() {
        $database = New Database\Database;
       
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillProductTypeClasses($SQLResult);
    }
    
    /**
     * Füllt die Warengruppen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \ProductTypes
     */
    Function fillProductTypeClasses($SQLResult) {
        $ProductTypes = New ProductTypes;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* ProductType */
            $ProductType = New ProductType\ProductType;
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
    Public Function setProductTypes() {
        return Null;
    }
}

?>