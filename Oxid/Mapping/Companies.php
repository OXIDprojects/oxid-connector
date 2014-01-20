<?php
require_once("../Database/Database.php");
require_once("../Classes/Company/CompanyConf.inc.php");

Class Companies {

    public $Company = array();

    /**
     * Ziehe Firmen vom Oxid-Shop
     * @return type
     */
    Public Function getCompanies() {
        $database = New Database;

        $query = "SELECT Cat.OXID " . "AS categoryId," .
                " Cat.OXPARENTID " . "AS categoryParentId," .
                " Cat.OXSORT " . "AS categorySort," .
                " Cat.OXACTIVE " . "AS categoryAktiv," .
                " Cat.OXHIDDEN " . "AS categoryHidden," .
                " Cat.OXTITLE " . "AS categoryName," .
                " Cat2Att.OXID " . "AS cat2AttId," .
                " Cat2Att.OXSORT " . "AS cat2AttSort" .
                " FROM oxcategories " . "AS Cat," .
                " oxcategory2attribute " . "AS Cat2Att";

        $SQLResult = $database->oxidStatement($query);

        echo $query;

        Return $this->fillCompanyClasses($SQLResult);
    }

    /**
     * Füllt die Firmen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Companies
     */
    Function fillCompanyClasses($SQLResult) {
        $Companies = New Companies;

        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* Company */
            $Company = New Company;
//            $Company->setAccountHolder($SQLResult[$i]['']);
//            $Company->setAccountNumber($SQLResult[$i]['']);
//            $Company->setBankCode($SQLResult[$i]['']);
//            $Company->setBankName($SQLResult[$i]['']);
//            $Company->setBic($SQLResult[$i]['']);
//            $Company->setBusinessman($SQLResult[$i]['']);
//            $Company->setCity($SQLResult[$i]['']);
//            $Company->setCountryIso($SQLResult[$i]['']);
//            $Company->setEMail($SQLResult[$i]['']);
//            $Company->setFax($SQLResult[$i]['']);
//            $Company->setIban($SQLResult[$i]['']);
//            $Company->setName($SQLResult[$i]['']);
//            $Company->setPhone($SQLResult[$i]['']);
//            $Company->setStreet($SQLResult[$i]['']);
//            $Company->setStreetNumber($SQLResult[$i]['']);
//            $Company->setTaxIdNumber($SQLResult[$i]['']);
//            $Company->setVatNumber($SQLResult[$i]['']);
//            $Company->setWww($SQLResult[$i]['']);
//            $Company->setZipCode($SQLResult[$i]['']);
            
            $Companies->Company[$i] = $Company;
        }

        return $Companies;
    }

    /**
     * Schreibe Firmen in Oxid-Shop
     * @return null
     */
    Public Function setCompanies() {
        return Null;
    }

}

$Companies = New Companies;
$result = $Companies->getCompanies();



//Ausgabe
echo "<pre>";
print_r($result);
echo "</pre>";
?>
<a href="http://localhost/">Zur&uuml;ck</a>