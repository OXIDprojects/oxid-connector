<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\Models\GlobalData;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalsConf.inc.php");

/**
 * Summary of Companies
 */
class Companies
{

    public $Company = array();

    /**
     * Ziehe Firmen vom Oxid-Shop
     * @return type
     */
    public function getCompanies()
    {
        $database = new Database\Database;

        $query = "SELECT * FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCompanyclasses($SQLResult);
    }

    /**
     * Füllt die Firmen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Companies
     */
    function fillCompanyclasses($SQLResult)
    {
        $Companies = new Companies;

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* Company */
            $Company = new Globals\Company;
            $Company->setName($SQLResult[$i]['OXCOMPANY']);
            $Company->setBusinessman($SQLResult[$i]['OXFNAME'] . ' ' . $SQLResult[$i]['OXLNAME']);
            $Company->setStreet($SQLResult[$i]['OXSTREET']);
            $Company->setZipCode($SQLResult[$i]['OXZIP']);
            $Company->setCity($SQLResult[$i]['OXCITY']);
            $Company->setCountryIso($SQLResult[$i]['OXCOUNTRY']);
            $Company->setPhone($SQLResult[$i]['OXTELEFON']);
            $Company->setFax($SQLResult[$i]['OXTELEFAX']);
            //$Company->setEMail($SQLResult[$i]['']); // Nicht in Oxid
            $Company->setWWW($SQLResult[$i]['OXURL']);
            $Company->setBankCode($SQLResult[$i]['OXBANKCODE']);
            $Company->setAccountNumber($SQLResult[$i]['OXBANKNUMBER']);
            $Company->setBankName($SQLResult[$i]['OXBANKNAME']);

            if (empty($SQLResult[$i]['OXCOMPANY']))
            {
                $Company->setAccountHolder($SQLResult[$i]['OXFNAME'] . ' ' . $SQLResult[$i]['OXLNAME']);
            }else{
                $Company->setAccountHolder($SQLResult[$i]['OXCOMPANY']);
            }

            $Company->setVatNumber($SQLResult[$i]['OXVATNUMBER']);
            //$Company->setTaxIdNumber($SQLResult[$i]['']); // Nicht in Oxid
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
    public function setCompanies()
    {
        return null;
    }

}
