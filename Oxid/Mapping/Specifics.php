<?php
require_once("../Database/Database.php");
require_once("../Classes/Specific/SpecificConf.inc.php");

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
        $database = New Database();
        $query = "SELECT OXID," .
                "OXTITLE," .
                "OXTITLE_1," .
                "OXTITLE_2," .
                "OXTITLE_3," .
                "OXDISPLAYINBASKET " .
                "FROM oxattribute";

        $SQLResult = $database->oxidStatement($query);

        echo $query;

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
            $Specific = New Specific;
//            $Specific->setGlobal($SQLResult[$i]['']);
            $Specific->setId($SQLResult[$i]['OXID']);
            $Specific->setName($SQLResult[$i]['OXTITLE']);
//            $Specific->setSort($SQLResult[$i]['']);
//            $Specific->setType($SQLResult[$i]['']);

            /* SpecificI18n */
            $SpecificI18n = New SpecificI18n;
//            $SpecificI18n->setLocaleName($SQLResult[$i]['']);
//            $SpecificI18n->setName($SQLResult[$i]['']);
            $SpecificI18n->setSpecificId($SQLResult[$i]['OXID']);

            /* SpecificValue */
            $SpecificValue = New SpecificValue;
            $SpecificValue->setId($SQLResult[$i]['OXID']);
//            $SpecificValue->setSort($SQLResult[$i]['']);
            $SpecificValue->setSpecificId($SQLResult[$i]['OXID']);

            /* SpecificValueI18n */
            $SpecificValueI18n = New SpecificValueI18n;
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

$Specifics = New Specifics;
$result = $Specifics->getSpecifics();

//Ausgabe
echo "<pre>";
print_r($result);
echo "</pre>";
?>
<a href="http://localhost/">Zur&uuml;ck</a>