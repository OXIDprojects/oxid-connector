<?php
Namespace jtl\Connector\Oxid\Mapping;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Company;

require_once("../Database/Database.php");
require_once("../Classes/Company/CompanyConf.inc.php");

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
            $Company->setName($SQLResult[$i]['OXCOMPANY']);
            $Company->setBusinessman($SQLResult[$i]['OXFNAME'] . ' ' . $SQLResult[$i]['OXLNAME']);
            $Company->setStreet($SQLResult[$i]['OXSTREET']);
            $Company->setZipCode($SQLResult[$i]['OXZIP']);
            $Company->setCity($SQLResult[$i]['OXCITY']);
            $Company->setCountryIso($SQLResult[$i]['OXCOUNTRY']);
            $Company->setPhone($SQLResult[$i]['OXTELEFON']);
            $Company->setFax($SQLResult[$i]['OXTELEFAX']);
//          $Company->setEMail($SQLResult[$i]['']); // Nicht in Oxid
            $Company->setWWW($SQLResult[$i]['OXURL']);
            $Company->setBankCode($SQLResult[$i]['OXBANKCODE']);
            $Company->setAccountNumber($SQLResult[$i]['OXBANKNUMBER']);
            $Company->setBankName($SQLResult[$i]['OXBANKNAME']);
            
            If (empty($SQLResult[$i]['OXCOMPANY']))
            {
                $Company->setAccountHolder($SQLResult[$i]['OXFNAME'] . ' ' . $SQLResult[$i]['OXLNAME']);    
            }else{
                $Company->setAccountHolder($SQLResult[$i]['OXCOMPANY']);    
            }                
        
            $Company->setVatNumber($SQLResult[$i]['OXVATNUMBER']);
//          $Company->setTaxIdNumber($SQLResult[$i]['']); // Nicht in Oxid
            $Company->setIban($SQLResult[$i]['OXIBANNUMBER']);
            $Company->setBic($SQLResult[$i]['OXBICCODE']);
            
            
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

//Testausgabe
$Companies = New Companies;
$result = $Companies->getCompanies();

echo "<pre>";
print_r($result);
echo "</pre>";

?>
<a href="http://localhost/">Zur&uuml;ck</a>