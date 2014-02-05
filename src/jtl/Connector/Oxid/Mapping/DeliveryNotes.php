<?php
Namespace jtl\Connector\Oxid\Mapping;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\DeliveryNote;

require_once("../Database/Database.php");
require_once("../Classes/DeliveryNote/DeliveryNoteConf.inc.php");

Class DeliveryNotes {

    public $Shipment = array();
    public $DeliveryNote = array();
    public $DeliveryNoteItem = array();

    /**
     * Ziehe Lieferscheine vom Oxid-Shop
     * @return type
     */
    Public Function getDeliveryNotes() {
        $database = New Database\Database;
       
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillDeliveryNoteClasses($SQLResult);
    }
    
    /**
     * Füllt die Lieferschein-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \DeliveryNotes
     */
    Function fillDeliveryNoteClasses($SQLResult) {
        $DeliveryNotes = New DeliveryNotes;
        
        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* DeliveryNote */
            $DeliveryNote = New DeliveryNote\DeliveryNote;
            //$DeliveryNote->setId($SQLResult[$i]['']);
            //$DeliveryNote->setCustomerOrderId($SQLResult[$i]['']);
            //$DeliveryNote->setNote($SQLResult[$i]['']);
            //$DeliveryNote->setCreated($SQLResult[$i]['']);
            //$DeliveryNote->setIsFulfillment($SQLResult[$i]['']);
            //$DeliveryNote->setStatus($SQLResult[$i]['']); //(open || processing || completed)
            
            /* DeliveryNoteItem */
            $DeliveryNoteItem = New DeliveryNote\DeliveryNoteItem;
            //$DeliveryNoteItem->setId($SQLResult[$i]['']);
            //$DeliveryNoteItem->setDeliveryNoteId($SQLResult[$i]['']);
            //$DeliveryNoteItem->setOrderPositionId($SQLResult[$i]['']);
            //$DeliveryNoteItem->setQuantity($SQLResult[$i]['']);
            //$DeliveryNoteItem->setWarehouseId($SQLResult[$i]['']);
            //$DeliveryNoteItem->setSerialNumber($SQLResult[$i]['']);
            //$DeliveryNoteItem->setBatchNumber($SQLResult[$i]['']);
            //$DeliveryNoteItem->setBestBefore($SQLResult[$i]['']);
            
            /* Shipment */
            $Shipment = new DeliveryNote\Shipment;
            //$Shipment->setId($SQLResult[$i]['']);
            //$Shipment->setDeliveryNoteId($SQLResult[$i]['']);
            //$Shipment->setLogistic($SQLResult[$i]['']);
            //$Shipment->setLogisticURL($SQLResult[$i]['']);
            //$Shipment->setIdentCode($SQLResult[$i]['']);
            //$Shipment->setCreated($SQLResult[$i]['']);
            //$Shipment->setShippingWeight($SQLResult[$i]['']);
            //$Shipment->setFulfillmentCenter($SQLResult[$i]['']);
            //$Shipment->setArrivalDate($SQLResult[$i]['']);
            //$Shipment->setShipmentDate($SQLResult[$i]['']);
            //$Shipment->setNote($SQLResult[$i]['']);
            
            $DeliveryNotes->DeliveryNote[$i] = $DeliveryNote;
            $DeliveryNotes->DeliveryNoteItem[$i] = $DeliveryNoteItem;
            $DeliveryNotes->Shipment[$i] = $Shipment;
        }

        return $DeliveryNotes;
    }

    /**
     * Schreibe Lieferscheine in Oxid-Shop
     * @return null
     */
    Public Function setDeliveryNotes() {
        return Null;
    }

}

//Testausgabe
$DeliveryNotes = New DeliveryNotes;
$result = $DeliveryNotes->getDeliveryNotes();

echo "<pre>";
print_r($result);
echo "</pre>";

?>
<a href="http://localhost/">Zur&uuml;ck</a>