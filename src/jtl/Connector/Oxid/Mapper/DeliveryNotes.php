<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\DeliveryNote;

require_once("../Database/Database.php");
require_once("../Models/DeliveryNote/DeliveryNoteConf.inc.php");

class DeliveryNotes {

    public $Shipment = array();
    public $DeliveryNote = array();
    public $DeliveryNoteItem = array();

    /**
     * Ziehe Lieferscheine vom Oxid-Shop
     * @return type
     */
    public function getDeliveryNotes() {
        $database = new Database\Database;
       
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillDeliveryNoteclasses($SQLResult);
    }
    
    /**
     * Füllt die Lieferschein-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \DeliveryNotes
     */
    function fillDeliveryNoteclasses($SQLResult) {
        $DeliveryNotes = new DeliveryNotes;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {

            /* DeliveryNote */
            $DeliveryNote = new DeliveryNote\DeliveryNote;
            //$DeliveryNote->setId($SQLResult[$i]['']);
            //$DeliveryNote->setCustomerOrderId($SQLResult[$i]['']);
            //$DeliveryNote->setNote($SQLResult[$i]['']);
            //$DeliveryNote->setCreated($SQLResult[$i]['']);
            //$DeliveryNote->setIsFulfillment($SQLResult[$i]['']);
            //$DeliveryNote->setStatus($SQLResult[$i]['']); //(open || processing || completed)
            
            /* DeliveryNoteItem */
            $DeliveryNoteItem = new DeliveryNote\DeliveryNoteItem;
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
    public function setDeliveryNotes() {
        return Null;
    }

}

//Testausgabe
$DeliveryNotes = new DeliveryNotes;
$result = $DeliveryNotes->getDeliveryNotes();

echo "<pre>";
print_r($result);
echo "</pre>";