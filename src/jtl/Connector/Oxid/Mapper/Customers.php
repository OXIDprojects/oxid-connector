<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\Customer;

require_once("../Database/Database.php");
require_once("../Models/Customer/CustomerConf.inc.php");

class Customers {

    public $Customer = array();
    public $CustomerAttr = array();

    /**
     * Ziehe Kunden vom Oxid-Shop
     * @return type
     */
    public function getCustomers() {
        $database = new Database\Database;

        $query = "SELECT oxuser.*," .
                " oxnewssubscribed.OXDBOPTIN" .
                " FROM oxuser" .
                " INNER JOIN oxnewssubscribed" .
                " ON oxuser.OXID = oxnewssubscribed.OXUSERID;";

        $SQLResult = $database->oxidStatement($query);
        
        return $this->fillCustomerclasses($SQLResult);
    }

    /**
     * Füllt die Kunden-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Specifics
     */
    function fillCustomerclasses($SQLResult) {
        $Customers = new Customers;

        for ($i = 0; $i < count($SQLResult); ++$i) {

            /* Customer */
            $Customer = new Customer\Customer;          
            $Customer->setId($SQLResult[$i]['OXID']);
            $Customer->setCustomerGroupId(0); //Mehrere in Oxid, daher Standard Gruppe für JTL-Wawi
//            $Customer->setTitle($SQLResult[$i]['']); // Not in Oxid
//            $Customer->setLocaleName($SQLResult[$i]['']); // Not in Oxid
            $Customer->setCustomerNumber($SQLResult[$i]['OXCUSTNR']);
//            $Customer->setPassword($SQLResult[$i]['OXPASSWORD']); // Passwort rausgenommen
            $Customer->setPassword($SQLResult[$i]['']);
            $Customer->setSalutation($SQLResult[$i]['OXSAL']);
            $Customer->setFirstName($SQLResult[$i]['OXFNAME']);
            $Customer->setLastName($SQLResult[$i]['OXLNAME']);
            $Customer->setCompany($SQLResult[$i]['OXCOMPANY']);
            $Customer->setDeliveryInstruction($SQLResult[$i]['OXADDINFO']);
            $Customer->setStreet($SQLResult[$i]['OXSTREET'] . ' ' . $SQLResult[$i]['OXSTREETNR']);
//            $Customer->setExtraAddressLine($SQLResult[$i]['']); // Not in Oxid
            $Customer->setZipCode($SQLResult[$i]['OXZIP']);
            $Customer->setCity($SQLResult[$i]['OXCITY']);
            $Customer->setState($SQLResult[$i]['OXSTATEID']);
//            $Customer->setCountryIso($SQLResult[$i]['']); // Not in Oxid
            $Customer->setPhone($SQLResult[$i]['OXPRIVFON']);
            $Customer->setMobile($SQLResult[$i]['OXMOBFON']);
            $Customer->setFax($SQLResult[$i]['OXFAX']);
            $Customer->setEMail($SQLResult[$i]['OXUSERNAME']);
            $Customer->setVatNumber($SQLResult[$i]['OXUSTID']);
            $Customer->setWww($SQLResult[$i]['OXURL']);
//            $Customer->setAccountCredit($SQLResult[$i]['']); // Not in Oxid
            $Customer->setHasnewsletterSubscription($SQLResult[$i]['OXDBOPTIN']);
            $Customer->setBirthday($SQLResult[$i]['OXBIRTHDATE']);
//            $Customer->setDiscount($SQLResult[$i]['']); // Not in Oxid (wird in Gruppen geregelt)
//            $Customer->setOrigin($SQLResult[$i]['']); 
            $Customer->setCreated($SQLResult[$i]['OXCREATE']);
//            $Customer->setModified($SQLResult[$i]['']); // Not in Oxid
            $Customer->setIsActive($SQLResult[$i]['OXACTIVE']);
//            $Customer->setIsFetched($SQLResult[$i]['']); // Not in Oxid
//            $Customer->setHasCustomerAccount($SQLResult[$i]['']); // Not in Oxid
            
            /* CustomerAttr */
            $CustomerAttr = new Customer\CustomerAttr;
//            $CustomerAttr->setCustomerId($SQLResult[$i]['']);
//            $CustomerAttr->setId($SQLResult[$i]['']);
//            $CustomerAttr->setKey($SQLResult[$i]['']);
//            $CustomerAttr->setValue($SQLResult[$i]['']);


            $Customers->Customer[$i] = $Customer;
            $Customers->CustomerAttr[$i] = $CustomerAttr;
        }

        return $Customers;
    }

    /**Eine weitere WordPress-Seite
     * Schreibe Kunden in Oxid-Shop
     * @return nulls
     */
    public function setCustomers() {
        return Null;
    }

}

//Testausgabe
$Customers = new Customers;

$start = microtime(true);
$result = $Customers->getCustomers();
$end = microtime(true);

$laufzeit = $end - $start;
echo "Laufzeit: ".$laufzeit." Sekunden!";


echo "<pre>";
print_r($result);
echo "</pre>";