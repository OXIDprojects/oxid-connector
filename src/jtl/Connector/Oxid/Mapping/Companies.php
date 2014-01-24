<?php
Namespace jtl\Connector\Oxid\Mapping;

use jtl\Connector\Oxid\Classes\Company As Company;
use jtl\Connector\Oxid\Database As Database;

require_once("../Database/Database.php");
require_once("../Classes/Company/CompanyConf.inc.php");

echo "Dies ist ein Company-Test!";

Class Companies {

    public $Company = array();

    /**
     * Ziehe Firmen vom Oxid-Shop
     * @return type
     */
    Public Function getCompanies() {
        $database = New Database\Database;
       
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

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
            $Company = New Company\Company;
            $Company->setName($SQLResult[$i]['oxshops.OXCOMPANY']);
            $Company->setBusinessman($SQLResult[$i]['oxshops.OXFNAME'] . ' ' . $SQLResult[$i]['oxshops.OXLNAME']);
            $Company->setStreet($SQLResult[$i]['oxshops.OXSTREET']);
            $Company->setZipCode($SQLResult[$i]['oxshops.OXZIP']);
            $Company->setCity($SQLResult[$i]['oxshops.OXCITY']);
            $Company->setCountryIso($SQLResult[$i]['oxshops.OXCOUNTRY']);
            $Company->setPhone($SQLResult[$i]['oxshops.OXTELEFON']);
            $Company->setFax($SQLResult[$i]['oxshops.OXTELEFAX']);
//          $Company->setEMail($SQLResult[$i]['']); // Nicht in Oxid
            $Company->setWWW($SQLResult[$i]['oxshops.OXURL']);
            $Company->setBankCode($SQLResult[$i]['oxshops.OXBANKCODE']);
            $Company->setAccountNumber($SQLResult[$i]['oxshops.OXBANKNUMBER']);
            $Company->setBankName($SQLResult[$i]['oxshops.OXBANKNAME']);
            
            If (empty($SQLResult[$i]['oxshops.OXCOMPANY']))
            {
                $Company->setAccountHolder($SQLResult[$i]['oxshops.OXFNAME'] . ' ' . $SQLResult[$i]['oxshops.OXLNAME']);    
            }else{
                $Company->setAccountHolder($SQLResult[$i]['oxshops.OXCOMPANY']);    
            }                
        
            $Company->setVatNumber($SQLResult[$i]['oxshops.OXVATNUMBER']);
//          $Company->setTaxIdNumber($SQLResult[$i]['oxshops.']); // Nicht in Oxid
            $Company->setIban($SQLResult[$i]['oxshops.OXIBANNUMBER']);
            $Company->setBic($SQLResult[$i]['oxshops.OXBICCODE']);
            
            
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