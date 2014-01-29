<?php
Namespace jtl\Connector\Oxid\Mapping;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\CustomerOrder;
use jtl\Connector\Oxid\Classes\CustomerOrder\CustomerOrderPosition;

require_once("../Database/Database.php");
require_once("../Classes/CustomerOrder/CustomerOrderConf.inc.php");

Class CustomerOrders {

    public $CustomerOrderPositions = array();
    public $CustomerOrderPositionVariation = array();
    public $CustomerOrder = array();
    public $CustomerOrderAttr = array();
    public $CustomerOrderBillingAddress = array();
    public $CustomerOrderPaymentInfo = array();
    public $CustomerOrderShippingAddress = array();

    /**
     * Ziehe KundenBestellungen vom Oxid-Shop
     * @return type CustomerOrders
     */
    Public Function getCustomerOrders() {
        $database = New Database\Database;
        
        $query = " SELECT * " .
                 " FROM oxorder; ";
        
        $SQLResult = $database->oxidStatement($query);     

        Return $this->fillCustomerOrderClasses($SQLResult);
    }

    /**
     * Füllt die KundenBestellung-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerOrders
     */
    Function fillCustomerOrderClasses($SQLResult) {
        $CustomerOrders = New CustomerOrders;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {
        
            /* CustomerOrderPosition */
           $CustomerOrderPositions = New CustomerOrderPosition\CustomerOrderPositions;
           $CustomerOrderPositions = $this->getCustomerOrderPositions($SQLResult[$i]['OXID']);

            /* CustomerOrderPositionVariation */ /* Tabelle: oxobject2attribute */
            $CustomerOrderPositionVariation = New CustomerOrderPosition\CustomerOrderPositionVariation;
            $CustomerOrderPositions = $this->getCustomerOrderPositionVariations($SQLResult[$i]['OXID']);

            /* CustomerOrder */
            $CustomerOrder = New CustomerOrder\CustomerOrder;
            $CustomerOrder->setId($SQLResult[$i]['OXID']);
            $CustomerOrder->setCustomerId($SQLResult[$i]['OXUSERID']);
//            $CustomerOrder->setShippingAddressId($SQLResult[$i]['']);                         // Nicht in Oxid
//            $CustomerOrder->setBillingAddressId($SQLResult[$i]['']);                          // Nicht in Oxid
            $CustomerOrder->setShippingMethodId($SQLResult[$i]['OXDELTYPE']);
//            $CustomerOrder->setLocaleName($SQLResult[$i]['']);
//            $CustomerOrder->setCurrencyIso($SQLResult[$i]['']);
//            $CustomerOrder->setCredit($SQLResult[$i]['']);
            $CustomerOrder->setTotalSum($SQLResult[$i]['OXARTVATPRICE1']);
//            $CustomerOrder->setSession($SQLResult[$i]['']);
//            $CustomerOrder->setShippingMethodName($SQLResult[$i]['']);
//            $CustomerOrder->setOrderNumber($SQLResult[$i]['']);
//            $CustomerOrder->setShippingInfo($SQLResult[$i]['']);
//            $CustomerOrder->setShippingDate($SQLResult[$i]['']);
//            $CustomerOrder->setPaymentDate($SQLResult[$i]['']);
//            $CustomerOrder->setRatingNotificationDate($SQLResult[$i]['']);
//            $CustomerOrder->setTracking($SQLResult[$i]['']);
//            $CustomerOrder->setNote($SQLResult[$i]['']);
//            $CustomerOrder->setLogistic($SQLResult[$i]['']);
//            $CustomerOrder->setTrackingURL($SQLResult[$i]['']);
            $CustomerOrder->setIp($SQLResult[$i]['OXIP']);
//            $CustomerOrder->setIsFetched($SQLResult[$i]['']);
            $CustomerOrder->setStatus($SQLResult[$i]['OXBILLSTATEID']);
//            $CustomerOrder->setCreated($SQLResult[$i]['']);
//            $CustomerOrder->setPaymentModuleId($SQLResult[$i]['']);
//            $CustomerOrder->setEstimatedDeliveryDate($SQLResult[$i]['']);

            /* CustomerOrderAttr */
            $CustomerOrderAttr = New CustomerOrder\CustomerOrderAttr;
//            $CustomerOrderAttr->setId($SQLResult[$i]['']);                                    // Nicht in Oxid
            $CustomerOrderAttr->setCustomerOrderId($SQLResult[$i]['OXID']);
//            $CustomerOrderAttr->setKey($SQLResult[$i]['']);                                   // Nicht in Oxid
//            $CustomerOrderAttr->setValue($SQLResult[$i]['']);                                 // Nicht in Oxid

            /* CustomerOrderBillingAddress */
            $CustomerOrderBillingAddress = New CustomerOrder\CustomerOrderBillingAddress;
//            $CustomerOrderBillingAddress->setId($SQLResult[$i]['']);                          // Nicht in Oxid
            $CustomerOrderBillingAddress->setCustomer($SQLResult[$i]['OXUSERID']);
            $CustomerOrderBillingAddress->setSalutation($SQLResult[$i]['OXBILLSAL']);
            $CustomerOrderBillingAddress->setFirstName($SQLResult[$i]['OXBILLFNAME']);
            $CustomerOrderBillingAddress->setLastName($SQLResult[$i]['OXBILLLNAME']);
//            $CustomerOrderBillingAddress->setTitle($SQLResult[$i]['']);                       // Nicht in Oxid
            $CustomerOrderBillingAddress->setCompany($SQLResult[$i]['OXBILLCOMPANY']);
            $CustomerOrderBillingAddress->setDeliveryInstruction($SQLResult[$i]['OXBILLADDINFO']);
            $CustomerOrderBillingAddress->setStreet($SQLResult[$i]['OXBILLSTREET'] . ' ' . $SQLResult[$i]['OXBILLSTREETNR']);
//            $CustomerOrderBillingAddress->setExtraAddressLine($SQLResult[$i]['']);
            $CustomerOrderBillingAddress->setZipCode($SQLResult[$i]['OXBILLZIP']);
            $CustomerOrderBillingAddress->setCity($SQLResult[$i]['OXBILLCITY']);
            $CustomerOrderBillingAddress->setState($SQLResult[$i]['OXBILLSTATEID']);
            $CustomerOrderBillingAddress->setCountryIso($SQLResult[$i]['OXBILLCOUNTRYID']);
            $CustomerOrderBillingAddress->setPhone($SQLResult[$i]['OXBILLFON']);
//            $CustomerOrderBillingAddress->setMobile($SQLResult[$i]['']);                      // Nicht in Oxid
            $CustomerOrderBillingAddress->setFax($SQLResult[$i]['OXBILLFAX']);
            $CustomerOrderBillingAddress->setEMail($SQLResult[$i]['OXBILLEMAIL']);

            /* CustomerOrderPaymentInfo */
            $CustomerOrderPaymentInfo = New CustomerOrder\CustomerOrderPaymentInfo;
            $CustomerOrderPaymentInfo->setId($SQLResult[$i]['OXPAYID']);
            $CustomerOrderPaymentInfo->setCustomerOrderId($SQLResult[$i]['OXUSERID']);
//            $CustomerOrderPaymentInfo->setBankAccount($SQLResult[$i]['']);                    // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setBankCode($SQLResult[$i]['']);                       // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setAccountHolder($SQLResult[$i]['']);                  // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setAccountNumber($SQLResult[$i]['']);                  // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setIban($SQLResult[$i]['']);                           // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setBic($SQLResult[$i]['']);                            // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setCreditCardNumber($SQLResult[$i]['']);               // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setCreditCardVerificationNumber($SQLResult[$i]['']);   // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setCreditCardExpiration($SQLResult[$i]['']);           // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setCreditCardType($SQLResult[$i]['']);                 // Nicht in Oxid
//            $CustomerOrderPaymentInfo->setCreditCardHolder($SQLResult[$i]['']);               // Nicht in Oxid

            /* CustomerOrderShippingAddress */
            $CustomerOrderShippingAddress = New CustomerOrder\CustomerOrderShippingAddress;
//            $CustomerOrderShippingAddress->setId($SQLResult[$i]['']);                         // Nicht in Oxid
            $CustomerOrderShippingAddress->setCustomerId($SQLResult[$i]['OXUSERID']);
            $CustomerOrderShippingAddress->setSalutation($SQLResult[$i]['OXDELSAL']);
            $CustomerOrderShippingAddress->setFirstName($SQLResult[$i]['OXDELFNAME']);
            $CustomerOrderShippingAddress->setLastName($SQLResult[$i]['OXDELLNAME']);
//            $CustomerOrderShippingAddress->setTitle($SQLResult[$i]['']);                      // Nicht in Oxid
            $CustomerOrderShippingAddress->setCompany($SQLResult[$i]['OXDELCOMPANY']);
            $CustomerOrderShippingAddress->setDeliveryInstruction($SQLResult[$i]['OXDELADDINFO']);
            $CustomerOrderShippingAddress->setStreet($SQLResult[$i]['OXDELSTREET'] . ' ' . $SQLResult[$i]['OXDELSTREETNR']);
//            $CustomerOrderShippingAddress->setExtraAddressLine($SQLResult[$i]['']);           // Nicht in Oxid
            $CustomerOrderShippingAddress->setZipCode($SQLResult[$i]['OXDELZIP']);
            $CustomerOrderShippingAddress->setCity($SQLResult[$i]['OXDELCITY']);
            $CustomerOrderShippingAddress->setState($SQLResult[$i]['OXDELSTATEID']);
            $CustomerOrderShippingAddress->setCountryIso($SQLResult[$i]['OXDELCOUNTRYID']);
            $CustomerOrderShippingAddress->setPhone($SQLResult[$i]['OXDELFON']);
//            $CustomerOrderShippingAddress->setMobile($SQLResult[$i]['']);                     // Nicht in Oxid
            $CustomerOrderShippingAddress->setFax($SQLResult[$i]['OXDELFAX']);
//            $CustomerOrderShippingAddress->setEMail($SQLResult[$i]['']);                      // Nicht in Oxid

            
            $CustomerOrders->CustomerOrderPositions[$SQLResult[$i]['OXID']] = $CustomerOrderPositions;
            $CustomerOrders->CustomerOrderPositionVariation[$i] = $CustomerOrderPositionVariation;
            $CustomerOrders->CustomerOrder[$i] = $CustomerOrder;
            $CustomerOrders->CustomerOrderAttr[$i] = $CustomerOrderAttr;
            $CustomerOrders->CustomerOrderBillingAddress[$i] = $CustomerOrderBillingAddress;
            $CustomerOrders->CustomerOrderPaymentInfo[$i] = $CustomerOrderPaymentInfo;
            $CustomerOrders->CustomerOrderShippingAddress[$i] = $CustomerOrderShippingAddress;
        }

        return $CustomerOrders;
    }
    

    /**
     * Ziehe BestellungsWarenkorb-Inhalt vom Oxid-Shop
     * @param type $OrderId
     */
    Function getCustomerOrderPositions($OrderId) {
        $database = New Database\Database;
        
        $query = 'SELECT * ' .
	             'FROM oxorderarticles' .
                 ' WHERE oxorderarticles.OXORDERID = "' . $OrderId . '"' .
                 ' ORDER BY oxorderarticles.OXORDERID;';
        
                $SQLResult = $database->oxidStatement($query);
        
        Return $this->fillCustomerOrderPositions($SQLResult);
    }
    
    
    /**
     * Füllt den BestellungsWarenkorb mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerOrderPosition
     */
    function fillCustomerOrderPositions($SQLResult){
        $CustomerOrderPositions = New CustomerOrderPosition\CustomerOrderPositions;
        $CustomerOrderPositionArr = Array(New CustomerOrderPosition\CustomerOrderPosition);
       
        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* CustomerOrderPosition */
            $CustomerOrderPosition = New CustomerOrderPosition\CustomerOrderPosition;
            $CustomerOrderPosition->setId($SQLResult[$i]['OXID']);
            $CustomerOrderPosition->setCustomerOrderId($SQLResult[$i]['OXORDERID']);
            $CustomerOrderPosition->setProductId($SQLResult[$i]['OXARTID']);
//          $CustomerOrderPosition->setShippingClassId($SQLResult[$i]['']);             // Nicht in Oxid
            $CustomerOrderPosition->setSku($SQLResult[$i]['OXARTNUM']);
            $CustomerOrderPosition->setPrice($SQLResult[$i]['OXNPRICE']);
            $CustomerOrderPosition->setVat($SQLResult[$i]['OXVATPRICE']);
            $CustomerOrderPosition->setQuantity($SQLResult[$i]['OXAMOUNT']);
//          $CustomerOrderPosition->setType($SQLResult[$i]['']);                        // Nicht in Oxid
//          $CustomerOrderPosition->setUnique($SQLResult[$i]['']);                      // Nicht in Oxid
//          $CustomerOrderPosition->setConfigItemId($SQLResult[$i]['']);                // Nicht in Oxid

        
            $CustomerOrderPositionArr[$i] = $CustomerOrderPosition;
        }
        
        $CustomerOrderPositions->setCustomerOrderPosition($CustomerOrderPositionArr);    
        
        return $CustomerOrderPositions;
    }
    
    
    /**
     * Ziehe Warenkorbartikel Eigenschaften vom Oxid-Shop 
     * @param type $ArticleId
     */
    Function getCustomerOrderPositionVariations($OrderId) {
        $database = New Database\Database;
        
        
        $query = 'SELECT * ' .
	             'FROM oxorderarticles' .
                 ' WHERE oxorderarticles.OXORDERID = "' . $OrderId . '"' .
                 ' ORDER BY oxorderarticles.OXORDERID;';
        
        $SQLResult = $database->oxidStatement($query);
        
        Return $this->fillCustomerOrderPositionVariations($SQLResult);
    }
    
    /**
     * Füllt den Warenkorbartikel-Eigenschaften mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerOrderPositionVariations
     */
    function fillCustomerOrderPositionVariations($SQLResult){
        $CustomerOrderPositionVariations = New CustomerOrderPosition\CustomerOrderPositionVariations;
        $CustomerOrderPositionVariationArr = Array(New CustomerOrderPosition\CustomerOrderPositionVariation);
        
        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* CustomerOrderPositionVariation */
            $CustomerOrderPositionVariation = New CustomerOrderPosition\CustomerOrderPositionVariation;
            //$CustomerOrderPositionVariation->setId($SQLResult[$i]['']);
            //$CustomerOrderPositionVariation->setCustomerOrderPositionId($SQLResult[$i]['OXOBJECTID']);
            //$CustomerOrderPositionVariation->setProductVariationId($SQLResult[$i]['']);
            //$CustomerOrderPositionVariation->setProductVariationValueId($SQLResult[$i]['']);
            //$CustomerOrderPositionVariation->setProductVariationName($SQLResult[$i]['']);
            //$CustomerOrderPositionVariation->setProductVariationValueName($SQLResult[$i]['']);
            //$CustomerOrderPositionVariation->setFreeField($SQLResult[$i]['']);
            //$CustomerOrderPositionVariation->setSurcharge($SQLResult[$i]['']);

            $CustomerOrderPositionVariationArr[$i] = $CustomerOrderPositionVariation;
        }
        
        $CustomerOrderPositionVariations->setCustomerOrderPositionVariation($CustomerOrderPositionVariationArr);
        
        return $CustomerOrderPositionVariations;
    }
    
    /**
     * Schreibe Kundenbestellungen in Oxid-Shop
     * @return nulls
     */
    Public Function setCustomerOrders() {
        return Null;
    }

}

//Testausgabe
$CustomerOrders = New CustomerOrders;
$result = $CustomerOrders->getCustomerOrders();


echo "<pre>";
print_r($result);
echo "</pre>";

?>
<a href="http://localhost/">Zur&uuml;ck</a>