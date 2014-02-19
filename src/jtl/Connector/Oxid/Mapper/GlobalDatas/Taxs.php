<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\Models\GlobalData\Tax;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalDataConf.inc.php");

/**
 * Summary of Taxs
 */
class Taxs
{

    public $Taxclass = array();
    public $TaxRate = array();
    public $TaxZone = array();
    public $TaxZoneCountry = array();

    /**
     * Ziehe Besteuerung vom Oxid-Shop
     * @return type
     */
    public function getTaxs()
    {
        $database = new Database\Database;

        //ToDO: Select Statement für Besteuerung
        $query = "SELECT * FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillTaxclasses($SQLResult);
    }

    /**
     * Füllt die Besteuerungs-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Taxs
     */
    function fillTaxclasses($SQLResult)
    {
        $Taxs = new Taxs;

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* Taxclass */
            $Taxclass = new Tax\Taxclass;
            //$Taxclass->setId($SQLResult[$i]['']);
            //$Taxclass->setName($SQLResult[$i]['']);
            //$Taxclass->setIsDefault($SQLResult[$i]['']);

            /* TaxRate */
            $TaxRate = new Tax\TaxRate;
            //$TaxRate->setId($SQLResult[$i]['']);
            //$TaxRate->setTaxZoneId($SQLResult[$i]['']);
            //$TaxRate->setTaxclassId($SQLResult[$i]['']);
            //$TaxRate->setRate($SQLResult[$i]['']);
            //$TaxRate->setPriority($SQLResult[$i]['']);

            /* TaxZone */
            $TaxZone = new Tax\TaxZone;
            //$TaxZone->setId($SQLResult[$i]['']);
            //$TaxZone->setName($SQLResult[$i]['']);

            /* TaxZoneCountry */
            $TaxZoneCountry = new Tax\TaxZoneCountry;
            //$TaxZoneCountry->setId($SQLResult[$i]['']);
            //$TaxZoneCountry->setTaxZoneId($SQLResult[$i]['']);
            //$TaxZoneCountry->setCountryIso($SQLResult[$i]['']);

            $Taxs->Taxclass[$i] = $Taxclass;
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
    public function setTaxs()
    {
        return null;
    }
}
