<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\Specific;

require_once("../../Database/Database.php");
require_once("../../Models/SpecificConf.inc.php");

class Specifics {

    public $Specific = array();
    public $SpecificI18n = array();
    public $SpecificValue = array();
    public $SpecificValueI18n = array();

    /**
     * Ziehe Mekmale vom Oxid-Shop
     * @return type
     */
    public function getSpecifics() {
        $database = new Database\Database();
        $query = "SELECT * " .
                "FROM oxattribute";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillSpecificclasses($SQLResult);
    }

    /**
     * Füllt die Merkmal-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Specifics
     */
    function fillSpecificclasses($SQLResult) {
        $Specifics = new Specifics;

        for ($i = 0; $i < count($SQLResult); ++$i) {

            /* Specific */
            $Specific = new Specific\Specific;
//            $Specific->setGlobal($SQLResult[$i]['']);
            $Specific->setId($SQLResult[$i]['OXID']);
            $Specific->setName($SQLResult[$i]['OXTITLE']);
//            $Specific->setSort($SQLResult[$i]['']);
//            $Specific->setType($SQLResult[$i]['']);

            /* SpecificI18n */
            $SpecificI18n = new Specific\SpecificI18n;
//            $SpecificI18n->setLocaleName($SQLResult[$i]['']);
//            $SpecificI18n->setName($SQLResult[$i]['']);
            $SpecificI18n->setSpecificId($SQLResult[$i]['OXID']);

            /* SpecificValue */
            $SpecificValue = new Specific\SpecificValue;
            $SpecificValue->setId($SQLResult[$i]['OXID']);
//            $SpecificValue->setSort($SQLResult[$i]['']);
            $SpecificValue->setSpecificId($SQLResult[$i]['OXID']);

            /* SpecificValueI18n */
            $SpecificValueI18n = new Specific\SpecificValueI18n;
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
    public function setSpecifics() {
        return Null;
    }
}
