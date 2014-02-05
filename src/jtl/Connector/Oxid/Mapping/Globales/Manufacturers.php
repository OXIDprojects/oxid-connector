<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals\Manufacturer;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");

Class Manufacturers {

    public $Manufacturer = array();
    public $ManufacturerI18n = array();

    /**
     * Ziehe Hersteller vom Oxid-Shop
     * @return type
     */
    Public Function getManufacturers() {
        $database = New Database\Database;
        
        //ToDO: Select Statement für Hersteller
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillManufacturerClasses($SQLResult);
    }
    
    /**
     * Füllt die Hersteller-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Manufacturers
     */
    Function fillManufacturerClasses($SQLResult) {
        $Manufacturers = New Manufacturers;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* Manufacturer */
            $Manufacturer = New Manufacturer\Manufacturer;
            //$Manufacturer->setId($SQLResult[$i]['']);
            //$Manufacturer->setName($SQLResult[$i]['']);
            //$Manufacturer->setWWW($SQLResult[$i]['']);
            //$Manufacturer->setSort($SQLResult[$i]['']);
            //$Manufacturer->setUrl($SQLResult[$i]['']);
            
            /* ManufacturerI18n */
            $ManufacturerI18n = New Manufacturer\ManufacturerI18n;
            //$ManufacturerI18n->setManufacturerId($SQLResult[$i]['']);
            //$ManufacturerI18n->setLocaleName($SQLResult[$i]['']);
            //$ManufacturerI18n->setDescription($SQLResult[$i]['']);
            //$ManufacturerI18n->setMetaDescription($SQLResult[$i]['']);
            //$ManufacturerI18n->setMetaKeywords($SQLResult[$i]['']);
            //$ManufacturerI18n->setTitleTag($SQLResult[$i]['']);
            
            $Manufacturers->Manufacturer[$i] = $Manufacturer;
            $Manufacturers->ManufacturerI18n[$i] = $ManufacturerI18n;
        }

        return $Manufacturers;
    }

    /**
     * Schreibe Hersteller in Oxid-Shop
     * @return null
     */
    Public Function setManufacturers() {
        return Null;
    }
}

?>