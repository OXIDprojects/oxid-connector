<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals\Tax;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");

Class Taxs {

    public $TaxClass = array();
    public $TaxRate = array();
    public $TaxZone = array();
    public $TaxZoneCountry = array();

    /**
     * Ziehe Besteuerung vom Oxid-Shop
     * @return type
     */
    Public Function getTaxs() {
        $database = New Database\Database;
        
        //ToDO: Select Statement für Besteuerung
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillTaxClasses($SQLResult);
    }
    
    /**
     * Füllt die Besteuerungs-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Taxs
     */
    Function fillTaxClasses($SQLResult) {
        $Taxs = New Taxs;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* TaxClass */
            $TaxClass = New Tax\TaxClass;
            //$TaxClass->setId($SQLResult[$i]['']);
            //$TaxClass->setName($SQLResult[$i]['']);
            //$TaxClass->setIsDefault($SQLResult[$i]['']);
            
            /* TaxRate */
            $TaxRate = New Tax\TaxRate;
            //$TaxRate->setId($SQLResult[$i]['']);
            //$TaxRate->setTaxZoneId($SQLResult[$i]['']);
            //$TaxRate->setTaxClassId($SQLResult[$i]['']);
            //$TaxRate->setRate($SQLResult[$i]['']);
            //$TaxRate->setPriority($SQLResult[$i]['']);
            
            /* TaxZone */
            $TaxZone = New Tax\TaxZone;
            //$TaxZone->setId($SQLResult[$i]['']);
            //$TaxZone->setName($SQLResult[$i]['']);
            
            /* TaxZoneCountry */
            $TaxZoneCountry = new Tax\TaxZoneCountry;
            //$TaxZoneCountry->setId($SQLResult[$i]['']);
            //$TaxZoneCountry->setTaxZoneId($SQLResult[$i]['']);
            //$TaxZoneCountry->setCountryIso($SQLResult[$i]['']);
            
            $Taxs->TaxClass[$i] = $TaxClass;
            $Taxs->TaxRate[$i] = $TaxRate;
            $Taxs->TaxZone[$i] = $TaxZone;
            $Taxs->TaxZoneCountry[$i] = $TaxZoneCountry;
        }

        return $Taxs;
    }

    /**
     * Schreibe Besteuerung in Oxid-Shop
     * @return null
     */
    Public Function setTaxs() {
        return Null;
    }
}
?>