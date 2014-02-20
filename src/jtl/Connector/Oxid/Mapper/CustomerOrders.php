<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\Utilities,
jtl\Connector\Oxid\Models\CustomerOrder,
jtl\Connector\Oxid\Models\CustomerOrder\CustomerOrderItem;

require_once("../Database/Database.php");
require_once("../Models/CustomerOrder/CustomerOrderConf.inc.php");

/**
 * Summary of CustomerOrders
 */
class CustomerOrders
{

    public $CustomerOrder = array();
    public $CustomerOrderAttr = array();
    public $CustomerOrderItems = array();
    public $CustomerOrderPaymentInfo = array();
    public $CustomerOrderShippingAddress = array();
    public $CustomerOrderBillingAddress = array();

    /**
     * Ziehe KundenBestellungen vom Oxid-Shop
     * @return type CustomerOrders
     */
    public function getCustomerOrders()
    {
        $database = new Database\Database;

        $query = "SELECT * FROM oxorder;";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCustomerOrderclasses($SQLResult);
    }

    /**
     * Füllt die KundenBestellung-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerOrders
     */
    function fillCustomerOrderclasses($SQLResult)
    {
        $CustomerOrders = new CustomerOrders;

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* CustomerOrder */
            $CustomerOrder = new CustomerOrder\CustomerOrder;
            $CustomerOrder->setId($SQLResult[$i]['OXID']);
            $CustomerOrder->setCustomerId($SQLResult[$i]['OXUSERID']);
            //            $CustomerOrder->setShippingAddressId($SQLResult[$i]['']);         // Nicht in Oxid
            //            $CustomerOrder->setBillingAddressId($SQLResult[$i]['']);          // Nicht in Oxid
            $CustomerOrder->setShippingMethodId($SQLResult[$i]['OXDELTYPE']);
            $CustomerOrder->setLocaleName($SQLResult[$i]['OXLANG']);
            $CustomerOrder->setCurrencyIso($SQLResult[$i]['OXCURRENCY']);
            $CustomerOrder->setCredit($SQLResult[$i]['OXVOUCHERDISCOUNT']);
            $CustomerOrder->setTotalSum($SQLResult[$i]['OXARTVATPRICE1']);
            //            $CustomerOrder->setSession($SQLResult[$i]['']);                   // Nicht in Oxid
            $CustomerOrder->setShippingMethodName($SQLResult[$i]['OXDELTYPE']);
            $CustomerOrder->setOrderNumber($SQLResult[$i]['OXORDERNR']);
            //            $CustomerOrder->setShippingInfo($SQLResult[$i]['']);              // Nicht in Oxid
            $CustomerOrder->setShippingDate($SQLResult[$i]['OXSENDDATE']);
            $CustomerOrder->setPaymentDate($SQLResult[$i]['OXPAID']);
            //            $CustomerOrder->setRatingNotificationDate($SQLResult[$i]['']);    // Nicht in Oxid
            $CustomerOrder->setTracking($SQLResult[$i]['OXTRACKCODE']);
            $CustomerOrder->setNote($SQLResult[$i]['OXREMARK']);
            //            $CustomerOrder->setLogistic($SQLResult[$i]['']);                  // Nicht in Oxid
            $CustomerOrder->setTrackingURL($SQLResult[$i]['OXTRACKCODE']);
            $CustomerOrder->setIp($SQLResult[$i]['OXIP']);
            //            $CustomerOrder->setIsFetched($SQLResult[$i]['']);                 // Nicht in Oxid
            $CustomerOrder->setStatus($SQLResult[$i]['OXBILLSTATEID']);
            $CustomerOrder->setCreated($SQLResult[$i]['OXORDERDATE']);
            $CustomerOrder->setPaymentModuleId($SQLResult[$i]['OXPAYMENTID']);
            $CustomerOrder->setEstimatedDeliveryDate($SQLResult[$i]['OXORDERDATE']);

            /* CustomerOrderAttr */
            $CustomerOrderAttr = new CustomerOrder\CustomerOrderAttr;
            //            $CustomerOrderAttr->setId($SQLResult[$i]['']);                    // Nicht in Oxid
            $CustomerOrderAttr->setCustomerOrderId($SQLResult[$i]['OXID']);
            //            $CustomerOrderAttr->setKey($SQLResult[$i]['']);                   // Nicht in Oxid
            //            $CustomerOrderAttr->setValue($SQLResult[$i]['']);                 // Nicht in Oxid

            /* CustomerOrderItem */
            $CustomerOrderItems = new CustomerOrderItem\CustomerOrderItems;

            $CustomerOrderItems = $this->getCustomerOrderItems($SQLResult[$i]['OXID']);

            /* CustomerOrderPaymentInfo */
            $CustomerOrderPaymentInfo = new CustomerOrder\CustomerOrderPaymentInfo;

            $CustomerOrderPaymentInfo = $this->getCustomerOrderPaymentInfos($SQLResult[$i]['OXPAYMENTID'], $SQLResult[$i]['OXUSERID']);

            /* CustomerOrderShippingAddress */
            $CustomerOrderShippingAddress = new CustomerOrder\CustomerOrderShippingAddress;
            //            $CustomerOrderShippingAddress->setId($SQLResult[$i]['']);                 // Nicht in Oxid
            $CustomerOrderShippingAddress->setCustomerId($SQLResult[$i]['OXUSERID']);
            $CustomerOrderShippingAddress->setSalutation($SQLResult[$i]['OXDELSAL']);
            $CustomerOrderShippingAddress->setFirstName($SQLResult[$i]['OXDELFNAME']);
            $CustomerOrderShippingAddress->setLastName($SQLResult[$i]['OXDELLNAME']);
            //            $CustomerOrderShippingAddress->setTitle($SQLResult[$i]['']);              // Nicht in Oxid
            $CustomerOrderShippingAddress->setCompany($SQLResult[$i]['OXDELCOMPANY']);
            $CustomerOrderShippingAddress->setDeliveryInstruction($SQLResult[$i]['OXDELADDINFO']);
            $CustomerOrderShippingAddress->setStreet($SQLResult[$i]['OXDELSTREET'] . ' ' . $SQLResult[$i]['OXDELSTREETNR']);
            //            $CustomerOrderShippingAddress->setExtraAddressLine($SQLResult[$i]['']);   // Nicht in Oxid
            $CustomerOrderShippingAddress->setZipCode($SQLResult[$i]['OXDELZIP']);
            $CustomerOrderShippingAddress->setCity($SQLResult[$i]['OXDELCITY']);
            $CustomerOrderShippingAddress->setState($SQLResult[$i]['OXDELSTATEID']);
            $CustomerOrderShippingAddress->setCountryIso($SQLResult[$i]['OXDELCOUNTRYID']);
            $CustomerOrderShippingAddress->setPhone($SQLResult[$i]['OXDELFON']);
            //            $CustomerOrderShippingAddress->setMobile($SQLResult[$i]['']);             // Nicht in Oxid
            $CustomerOrderShippingAddress->setFax($SQLResult[$i]['OXDELFAX']);
            //            $CustomerOrderShippingAddress->setEMail($SQLResult[$i][]);                // Nicht in Oxid

            /* CustomerOrderBillingAddress */
            $CustomerOrderBillingAddress = new CustomerOrder\CustomerOrderBillingAddress;
            //          $CustomerOrderBillingAddress->setId($SQLResult[$i]['']);                    // Nicht in Oxid
            $CustomerOrderBillingAddress->setCustomerId($SQLResult[$i]['OXUSERID']);
            $CustomerOrderBillingAddress->setSalutation($SQLResult[$i]['OXBILLSAL']);
            $CustomerOrderBillingAddress->setFirstName($SQLResult[$i]['OXBILLFNAME']);
            $CustomerOrderBillingAddress->setLastName($SQLResult[$i]['OXBILLLNAME']);
            //          $CustomerOrderBillingAddress->setTitle($SQLResult[$i]['']);                 // Nicht in Oxid
            $CustomerOrderBillingAddress->setCompany($SQLResult[$i]['OXBILLCOMPANY']);
            $CustomerOrderBillingAddress->setDeliveryInstruction($SQLResult[$i]['OXBILLADDINFO']);
            $CustomerOrderBillingAddress->setStreet($SQLResult[$i]['OXBILLSTREET'] . ' ' . $SQLResult[$i]['OXBILLSTREETNR']);
            //          $CustomerOrderBillingAddress->setExtraAddressLine($SQLResult[$i]['']);      // Nicht in Oxid
            $CustomerOrderBillingAddress->setZipCode($SQLResult[$i]['OXBILLZIP']);
            $CustomerOrderBillingAddress->setCity($SQLResult[$i]['OXBILLCITY']);
            $CustomerOrderBillingAddress->setState($SQLResult[$i]['OXBILLSTATEID']);
            $CustomerOrderBillingAddress->setCountryIso($SQLResult[$i]['OXBILLCOUNTRYID']);
            $CustomerOrderBillingAddress->setPhone($SQLResult[$i]['OXBILLFON']);
            $CustomerOrderBillingAddress->setMobile($CustomerOrders->fillBillingAdressMobileFromOxUser($SQLResult[$i]['OXUSERID']));
            $CustomerOrderBillingAddress->setFax($SQLResult[$i]['OXBILLFAX']);
            $CustomerOrderBillingAddress->setEMail($SQLResult[$i]['OXBILLEMAIL']);


            $CustomerOrders->CustomerOrder[$i] = $CustomerOrder;
            $CustomerOrders->CustomerOrderAttr[$i] = $CustomerOrderAttr;
            $CustomerOrders->CustomerOrderItems[$SQLResult[$i]['OXID']] = $CustomerOrderItems;
            $CustomerOrders->CustomerOrderPaymentInfo[$i] = $CustomerOrderPaymentInfo;
            $CustomerOrders->CustomerOrderShippingAddress[$i] = $CustomerOrderShippingAddress;
            $CustomerOrders->CustomerOrderBillingAddress[$i] = $CustomerOrderBillingAddress;
        }

        return $CustomerOrders;
    }

    /**
     * Schreibe Kundenbestellungen in Oxid-Shop
     * @return nulls
     */
    public function setCustomerOrders()
    {
        return null;
    }


    /**
     * Ziehe BestellungsWarenkorb-Inhalt vom Oxid-Shop
     * @param type $OrderId
     */
    function getCustomerOrderItems($OrderId)
    {
        $database = new Database\Database;

        $query = "SELECT * FROM oxorderarticles WHERE oxorderarticles.OXORDERID = '{$OrderId}' ORDER BY oxorderarticles.OXORDERID;";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCustomerOrderItems($SQLResult);
    }


    /**
     * Füllt den BestellungsWarenkorb mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerOrderItem
     */
    function fillCustomerOrderItems($SQLResult)
    {
        $CustomerOrderItems = new CustomerOrderItem\CustomerOrderItems;
        $CustomerOrderItemArr = array(new CustomerOrderItem\CustomerOrderItem);

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* CustomerOrderItem */
            $CustomerOrderItem = new CustomerOrderItem\CustomerOrderItem;

            $CustomerOrderItem->setCustomerOrderItemVariations($this->getCustomerOrderItemVariations($SQLResult[$i]['OXARTID']));

            $CustomerOrderItem->setId($SQLResult[$i]['OXID']);
            $CustomerOrderItem->setProductId($SQLResult[$i]['OXARTID']);
            //          $CustomerOrderItem->setShippingclassId($SQLResult[$i]['']);             // Nicht in Oxid
            $CustomerOrderItem->setCustomerOrderId($SQLResult[$i]['OXORDERID']);

            $CustomerOrderItem->setSku($SQLResult[$i]['OXARTNUM']);
            $CustomerOrderItem->setPrice($SQLResult[$i]['OXNPRICE']);
            $CustomerOrderItem->setVat($SQLResult[$i]['OXVATPRICE']);
            $CustomerOrderItem->setQuantity($SQLResult[$i]['OXAMOUNT']);
            //          $CustomerOrderItem->setType($SQLResult[$i]['']);                        // Nicht in Oxid
            //          $CustomerOrderItem->setUnique($SQLResult[$i]['']);                      // Nicht in Oxid
            //          $CustomerOrderItem->setConfigItemId($SQLResult[$i]['']);                // Nicht in Oxid

            $CustomerOrderItemArr[$i] = $CustomerOrderItem;
        }

        $CustomerOrderItems->setCustomerOrderItem($CustomerOrderItemArr);

        return $CustomerOrderItems;
    }

	/**
     * Ziehe Warenkorbartikel Eigenschaften vom Oxid-Shop
     * @param type $ArticleId
     */
    function getCustomerOrderItemVariations($ArticleId)
    {
        $database = new Database\Database;

        $query = "SELECT * FROM oxobject2attribute WHERE oxobject2attribute.OXOBJECTID = '{$ArticleId}';";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCustomerOrderItemVariations($SQLResult);
    }

    /**
     * Füllt den Warenkorbartikel-Eigenschaften mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \CustomerOrderItemVariations
     */
    function fillCustomerOrderItemVariations($SQLResult)
    {
        $CustomerOrderItemVariations = new CustomerOrderItem\CustomerOrderItemVariations;
        $CustomerOrderItemVariationArr = Array(new CustomerOrderItem\CustomerOrderItemVariation);
        $int = 0;

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* CustomerOrderItemVariation */
            $CustomerOrderItemVariation = new CustomerOrderItem\CustomerOrderItemVariation;
            $CustomerOrderItemVariation->setId($SQLResult[$i]['OXID']);
            $CustomerOrderItemVariation->setCustomerOrderItemId($SQLResult[$i]['OXOBJECTID']);
            $CustomerOrderItemVariation->setProductVariationId($SQLResult[$i]['OXATTRID']);
            //$CustomerOrderItemVariation->setProductVariationValueId($SQLResult[$i]['']); // Nicht in Oxid
            $CustomerOrderItemVariation->setProductVariationName($SQLResult[$i]['OXVALUE']);
            $CustomerOrderItemVariation->setProductVariationValueName($SQLResult[$i]['OXVALUE_1']);
            //$CustomerOrderItemVariation->setFreeField($SQLResult[$i]['']); // Nicht in Oxid
            //$CustomerOrderItemVariation->setSurcharge($SQLResult[$i]['']); // Nicht in Oxid

            $CustomerOrderItemVariationArr[$i] = $CustomerOrderItemVariation;
        }

        $CustomerOrderItemVariations->setCustomerOrderItemVariation($CustomerOrderItemVariationArr);

        return $CustomerOrderItemVariations;
    }


    /**
     * Ziehe KundenBestellungsZahlungsInformationen vom Oxid-Shop
     * @return type CustomerOrderPaymentInfos
     */
    public function getCustomerOrderPaymentInfos($PayId = "" ,$UserId = "")
    {
        $database = new Database\Database;

        if (!empty($Payid) Or !empty($UserId))
        {
            $query = " SELECT OXID, " .
                     "        OXUSERID, " .
                     "        OXPAYMENTSID, " .
                     "        DECODE(OXVALUE, 'sd45DF09_sdlk09239DD') AS OXVALUEDECODED, " .
                     "        OXTIMESTAMP " .
                     " FROM oxuserpayments " .
                     " WHERE OXID = '{$PayId}' AND OXUSERID = '{$UserId}';";
        }
        else
        {
        	$query = " SELECT OXID, " .
                     "        OXUSERID, " .
                     "        OXPAYMENTSID, " .
                     "        DECODE(OXVALUE, 'sd45DF09_sdlk09239DD') AS OXVALUEDECODED, " .
                     "        OXTIMESTAMP " .
                     " FROM oxuserpayments ";
        }

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCustomerOrderPaymentInfoclasses($SQLResult);
    }

    function fillCustomerOrderPaymentInfoclasses($SQLResult)
    {
        $CustomerOrderPaymentInfo = new CustomerOrder\CustomerOrderPaymentInfo;
        $OxConfunctions = new Utilities\OxConfunctions;

        $bankName = "";
        $bankCode = "";
        $accountNumber = "";
        $accountHolder = "";

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            $blob = $SQLResult[$i]['OXVALUEDECODED'];

            if(preg_match('!lsbankname__(.*?)@@!', $blob, $lsbankname))
            {
                $bankName = $lsbankname[1];
            }

            if(preg_match('!lsblz__(.*?)@@!', $blob, $lsblz))
            {
                $bankCode = $lsblz[1];
            }

            if(preg_match('!lsktonr__(.*?)@@!', $blob, $lsktonr))
            {
                $accountNumber = $lsktonr[1];
            }

            if(preg_match('!lsktoinhaber__(.*?)@@!', $blob, $lsktoinhaber))
            {
                $accountHolder = $lsktoinhaber[1];
            }

            $CustomerOrderPaymentInfo->setId($SQLResult[$i]['OXID']);
            $CustomerOrderPaymentInfo->setCustomerOrderId($SQLResult[$i]['OXUSERID']);
            $CustomerOrderPaymentInfo->setBankName($bankName);

            if ($OxConfunctions->checkBIC($bankCode))
            {
                $CustomerOrderPaymentInfo->setBic($bankCode);
            }
            else
            {
                $CustomerOrderPaymentInfo->setBankCode($bankCode);
            }

            $CustomerOrderPaymentInfo->setAccountHolder($accountHolder);

            if ($OxConfunctions->checkIBAN($accountNumber))
            {
                $CustomerOrderPaymentInfo->setIban($accountNumber);
            }
            else
            {
                $CustomerOrderPaymentInfo->setAccountNumber($accountNumber);
            }
            //$CustomerOrderPaymentInfo->setCreditCardNumber($SQLResult[$i]['']);               // Nicht in Oxid
            //$CustomerOrderPaymentInfo->setCreditCardVerificationNumber($SQLResult[$i]['']);   // Nicht in Oxid
            //$CustomerOrderPaymentInfo->setCreditCardExpiration($SQLResult[$i]['']);           // Nicht in Oxid
            //$CustomerOrderPaymentInfo->setCreditCardType($SQLResult[$i]['']);                 // Nicht in Oxid
            //$CustomerOrderPaymentInfo->setCreditCardHolder($SQLResult[$i]['']);               // Nicht in Oxid

        }
        return $CustomerOrderPaymentInfo;
    }

    /**
     * Summary of fillBillingAdressMobileFromOxUser
     * Gibt die Handynummer von der Tabelle OXUSER zurück.
     * @param $UserId
     * @return $MobileNumber String
     */
    function fillBillingAdressMobileFromOxUser($UserId) {
        $database = new Database\Database;

        $query = "SELECT OXMOBFON FROM oxuser WHERE OXID = '{$UserId}';";

        $SQLResult = $database->oxidStatement($query);

        for ($i = 0; $i < count($SQLResult); ++$i) {
            $MobileNumber = $SQLResult[$i]['OXMOBFON'];
        }

        return $MobileNumber;
    }

}

//Testausgabe umbauen auf Testscripts:
$CustomerOrders = new CustomerOrders;

$start = microtime(true);
$result = $CustomerOrders->getCustomerOrders();
$end = microtime(true);

$laufzeit = $end - $start;
echo "Laufzeit: {$laufzeit} Sekunden! <br/>";

echo "<pre>";
print_r($result);
echo "</pre>";