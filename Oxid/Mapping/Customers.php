<?php
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
        $database = New Database;

        $query = "SELECT Usr.OXID " . "AS usrId," .
                " Usr.OXACTIVE " . "AS usrActive," .
                " Usr.OXRIGHTS " . "AS usrRights," .
                " Usr.OXSHOPID " . "AS usrShopId," .
                " Usr.OXUSERNAME " . "AS usrName," .
                " Usr.OXPASSWORD " . "AS usrPass," .
                " Usr.OXPASSSALT " . "AS usrPassAlt," .
                " Usr.OXCUSTNR " . "AS usrCustNo," .
                " Usr.OXUSTID " . "AS usrUstId," .
                " Usr.OXCOMPANY " . "AS usrCompany," .
                " Usr.OXFNAME " . "AS usrFirstName," .
                " Usr.OXLNAME " . "AS usrLastName," .
                " Usr.OXSTREET " . "AS usrStreet," .
                " Usr.OXSTREETNR " . "AS usrStreetNo," .
                " Usr.OXADDINFO " . "AS usrAddInfo," . //Zusätzliche Info
                " Usr.OXCITY " . "AS usrCity," .
                " Usr.OXCOUNTRYID " . "AS usrCountryId," .
                " Usr.OXSTATEID " . "AS usrStateId," . //Bundesland/Region
                " Usr.OXZIP " . "AS usrZip," .
                " Usr.OXFON " . "AS usrPhone," .
                " Usr.OXFAX " . "AS usrFax," .
                " Usr.OXSAL " . "AS usrSalutation," .
                " Usr.OXBONI " . "AS usrBoni," .
                " Usr.OXCREATE " . "AS usrCreate," .
                " Usr.OXPRIVFON " . "AS usrPrivatPhone," .
                " Usr.OXMOBFON " . "AS usrMobilePhone," .
                " Usr.OXBIRTHDATE " . "AS usrBirthday," .
                " Usr.OXURL " . "AS usrUrl," .
                " NewsSub.OXDBOPTIN " . "AS NewsSubAktiv" .
                " FROM oxuser " . "AS Usr" .
                " INNER JOIN oxnewssubscribed As NewsSub" .
                " ON Usr.OXID = NewsSub.OXUSERID;";

        $SQLResult = $database->oxidStatement($query);

        echo $query;

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
            $Customer = New Customer;
//            $Customer->setActivateCustomer($SQLResult[$i]['']);
//            $Customer->setCreateAccountPassword($SQLResult[$i]['']);
//            $Customer->setDeleteAccounts($SQLResult[$i]['']);
//            $Customer->setAccountCredit($SQLResult[$i]['']);

            $Customer->setId($SQLResult[$i]['usrId']);
//            $Customer->setCustomerGroupId($SQLResult[$i]['']); //Mehrere in Oxid
//            $Customer->setAccountCredit($SQLResult[$i]['']); //Not in Oxid
//            $Customer->setTitle($SQLResult[$i]['']); //Not in Oxid
//            $Customer->setLocaleName($SQLResult[$i]['']); //Not in Oxid
            $Customer->setCustomerNumber($SQLResult[$i]['usrCustNo']);
            $Customer->setPassword($SQLResult[$i]['usrPass']);
            $Customer->setSalutation($SQLResult[$i]['usrSalutation']);
            $Customer->setFirstName($SQLResult[$i]['usrFirstName']);
            $Customer->setLastName($SQLResult[$i]['usrLastName']);
            $Customer->setCompany($SQLResult[$i]['usrCompany']);
//            $Customer->setDeliveryInstruction($SQLResult[$i]['']);
            $Customer->setStreet($SQLResult[$i]['usrStreet']);
            $Customer->setStreetNumber($SQLResult[$i]['usrStreetNo']);
//            $Customer->setExtraAddressLine($SQLResult[$i]['']);
            $Customer->setZipCode($SQLResult[$i]['usrZip']);
            $Customer->setCity($SQLResult[$i]['usrCity']);
            $Customer->setState($SQLResult[$i]['usrStateId']);
//            $Customer->setCountryIso($SQLResult[$i]['']); //Not in Oxid            
            $Customer->setPhone($SQLResult[$i]['usrPrivatPhone']);
            $Customer->setMobile($SQLResult[$i]['usrMobilePhone']);
            $Customer->setFax($SQLResult[$i]['usrFax']);
            $Customer->setEMail($SQLResult[$i]['usrName']);
//            $Customer->setVatNumber($SQLResult[$i]['']);
            $Customer->setWww($SQLResult[$i]['usrUrl']);
//            $Customer->setAccountCredit($SQLResult[$i]['']);
            $Customer->setHasNewsletterSubscription($SQLResult[$i]['NewsSubAktiv']);
            $Customer->setBirthday($SQLResult[$i]['usrBirthday']);
//            $Customer->setDiscount($SQLResult[$i]['']);
//            $Customer->setOrigin($SQLResult[$i]['']);
            $Customer->setCreated($SQLResult[$i]['usrCreate']);
//            $Customer->setModified($SQLResult[$i]['']);
            $Customer->setIsActive($SQLResult[$i]['usrActive']);
//            $Customer->setIsFetched($SQLResult[$i]['']);
//            $Customer->setHasCustomerAccount($SQLResult[$i]['']);

            /* CustomerAttr */
            $CustomerAttr = New CustomerAttr;
//            $CustomerAttr->setCustomerId($SQLResult[$i]['']);
//            $CustomerAttr->setId($SQLResult[$i]['']);
//            $CustomerAttr->setKey($SQLResult[$i]['']);
//            $CustomerAttr->setValue($SQLResult[$i]['']);


            $Customers->Customer[$i] = $Customer;
            $Customers->CustomerAttr[$i] = $CustomerAttr;
        }

        return $Customers;
    }

    /**
     * Schreibe Kunden in Oxid-Shop
     * @return nulls
     */
    Public Function setCustomers() {
        return Null;
    }

}

$Customers = New Customers;
$result = $Customers->getCustomers();

//Ausgabe
echo "<pre>";
print_r($result);
echo "</pre>";
?>
<a href="http://localhost/">Zur&uuml;ck</a>