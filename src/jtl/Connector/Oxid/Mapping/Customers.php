<?php
Namespace jtl\Connector\Oxid\Mapping;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Customer;

require_once("../Database/Database.php");
require_once("../Classes/Customer/CustomerConf.inc.php");

Class Customers {

    public $Customer = array();
    public $CustomerAttr = array();

    /**
     * Ziehe Kunden vom Oxid-Shop
     * @return type
     */
    Public Function getCustomers() {
        $database = New Database\Database;

        $query = "SELECT oxuser.*," .
                " oxnewssubscribed.OXDBOPTIN" .
                " FROM oxuser" .
                " INNER JOIN oxnewssubscribed" .
                " ON oxuser.OXID = oxnewssubscribed.OXUSERID;";

        $SQLResult = $database->oxidStatement($query);
        
        Return $this->fillCustomerClasses($SQLResult);
    }

    /**
     * Füllt die Kunden-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Specifics
     */
    Function fillCustomerClasses($SQLResult) {
        $Customers = New Customers;

        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* Customer */
            $Customer = New Customer\Customer;
            // Wawi -> Shop Funktionen
//            $Customer->setActivateCustomer($SQLResult[$i]['']);
//            $Customer->setCreateAccountPassword($SQLResult[$i]['']);
//            $Customer->setDeleteAccounts($SQLResult[$i]['']);
//            $Customer->setSetAccountCredit($SQLResult[$i]['']);
            
            $Customer->setId($SQLResult[$i]['OXID']);
            $Customer->setCustomerGroupId(0); //Mehrere in Oxid, daher Standard Gruppe für JTL-Wawi
//            $Customer->setTitle($SQLResult[$i]['']); //Not in Oxid
//            $Customer->setLocaleName($SQLResult[$i]['']); //Not in Oxid
            $Customer->setCustomerNumber($SQLResult[$i]['OXCUSTNR']);
            $Customer->setPassword($SQLResult[$i]['OXPASSWORD']);
            $Customer->setSalutation($SQLResult[$i]['OXSAL']);
            $Customer->setFirstName($SQLResult[$i]['OXFNAME']);
            $Customer->setLastName($SQLResult[$i]['OXLNAME']);
            $Customer->setCompany($SQLResult[$i]['OXCOMPANY']);
            $Customer->setDeliveryInstruction($SQLResult[$i]['OXADDINFO']);
            $Customer->setStreet($SQLResult[$i]['OXSTREET'] . ' ' . $SQLResult[$i]['OXSTREETNR']);
//            $Customer->setExtraAddressLine($SQLResult[$i]['']);
            $Customer->setZipCode($SQLResult[$i]['OXZIP']);
            $Customer->setCity($SQLResult[$i]['OXCITY']);
            $Customer->setState($SQLResult[$i]['OXSTATEID']);
//            $Customer->setCountryIso($SQLResult[$i]['']); //Not in Oxid
            $Customer->setPhone($SQLResult[$i]['OXPRIVFON']);
            $Customer->setMobile($SQLResult[$i]['OXMOBFON']);
            $Customer->setFax($SQLResult[$i]['OXFAX']);
            $Customer->setEMail($SQLResult[$i]['OXUSERNAME']);
            $Customer->setVatNumber($SQLResult[$i]['OXUSTID']);
            $Customer->setWww($SQLResult[$i]['OXURL']);
//            $Customer->setAccountCredit($SQLResult[$i]['']); //Not in Oxid
            $Customer->setHasNewsletterSubscription($SQLResult[$i]['OXDBOPTIN']);
            $Customer->setBirthday($SQLResult[$i]['OXBIRTHDATE']);
//            $Customer->setDiscount($SQLResult[$i]['']);
//            $Customer->setOrigin($SQLResult[$i]['']);
            $Customer->setCreated($SQLResult[$i]['OXCREATE']);
//            $Customer->setModified($SQLResult[$i]['']);
            $Customer->setIsActive($SQLResult[$i]['OXACTIVE']);
//            $Customer->setIsFetched($SQLResult[$i]['']);
//            $Customer->setHasCustomerAccount($SQLResult[$i]['']);
            
            /* CustomerAttr */
            $CustomerAttr = New Customer\CustomerAttr;
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
    Public Function setCustomers() {
        return Null;
    }

}

//Testausgabe
$Customers = New Customers;
$result = $Customers->getCustomers();

echo "<pre>";
print_r($result);
echo "</pre>";
?>
<a href="http://localhost/">Zur&uuml;ck</a>