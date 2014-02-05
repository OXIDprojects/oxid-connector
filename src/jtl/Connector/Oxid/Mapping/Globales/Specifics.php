<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals\Specific;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");

Class Specifics {

    public $Specific = array();
    public $SpecificI18n = array();
    public $SpecificValue = array();
    public $SpecificValueI18n = array();

    /**
     * Ziehe Mekmale vom Oxid-Shop
     * @return type
     */
    Public Function getSpecifics() {
        $database = New Database\Database();
        $query = "SELECT * " .
                "FROM oxattribute";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillSpecificClasses($SQLResult);
    }

    /**
     * Füllt die Merkmal-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Specifics
     */
    Function fillSpecificClasses($SQLResult) {
        $Specifics = New Specifics;

        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* Specific */
            $Specific = New Specific\Specific;
//            $Specific->setGlobal($SQLResult[$i]['']);
            $Specific->setId($SQLResult[$i]['OXID']);
            $Specific->setName($SQLResult[$i]['OXTITLE']);
//            $Specific->setSort($SQLResult[$i]['']);
//            $Specific->setType($SQLResult[$i]['']);

            /* SpecificI18n */
            $SpecificI18n = New Specific\SpecificI18n;
//            $SpecificI18n->setLocaleName($SQLResult[$i]['']);
//            $SpecificI18n->setName($SQLResult[$i]['']);
            $SpecificI18n->setSpecificId($SQLResult[$i]['OXID']);

            /* SpecificValue */
            $SpecificValue = New Specific\SpecificValue;
            $SpecificValue->setId($SQLResult[$i]['OXID']);
//            $SpecificValue->setSort($SQLResult[$i]['']);
            $SpecificValue->setSpecificId($SQLResult[$i]['OXID']);

            /* SpecificValueI18n */
            $SpecificValueI18n = New Specific\SpecificValueI18n;
            $SpecificValueI18n->setDescription($SQLResult[$i]['OXTITLE']);
//            $SpecificValueI18n->setLocaleName($SQLResult[$i]['']);
//            $SpecificValueI18n->setMetaDescription($SQLResult[$i]['']);
//            $SpecificValueI18n->setMetaKeywords($SQLResult[$i]['']);
            $SpecificValueI18n->setSpecificValueId($SQLResult[$i]['OXID']);
//            $SpecificValueI18n->setTitleTag($SQLResult[$i]['']);
//            $SpecificValueI18n->setUrl($SQLResult[$i]['']);
//            $SpecificValueI18n->setValue($SQLResult[$i]['']);

            $Specifics->Specific[$i] = $Specific;
            $Specifics->SpecificI18n[$i] = $SpecificI18n;
            $Specifics->SpecificValue[$i] = $SpecificValue;
            $Specifics->SpecificValueI18n[$i] = $SpecificValueI18n;
        }

        return $Specifics;
    }

    /**
     * Schreibe Merkmale in Oxid-Shop
     * @return null
     */
    Public Function setSpecifics() {
        return Null;
    }
}
?>