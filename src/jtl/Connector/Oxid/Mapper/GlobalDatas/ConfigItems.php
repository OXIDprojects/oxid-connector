<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\GlobalData\ConfigItem;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalsConf.inc.php");

class ConfigItems {
    
    public $ConfigItem = array();
    public $ConfigItemI18n = array();
    public $ConfigItemPrice = array();
    
    /**
     * Ziehe Konfigurationsartikel vom Oxid-Shop
     * @return type
     */
    public function getConfigItems() {
        $database = new Database\Database;
        
        //ToDO: Select Statement für Konfigurationsartikel
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillConfigItemclasses($SQLResult);
    }
    
    /**
     * Füllt die Konfigurationsartikel-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \ConfigItems
     */
    function fillConfigItemclasses($SQLResult) {
        $ConfigItems = new ConfigItems;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* ConfigItem */
            $ConfigItem = new ConfigItem\ConfigItem;
            //$ConfigItem->setId($SQLResult[$i]['']);
            //$ConfigItem->setConfigGroupId($SQLResult[$i]['']);
            //$ConfigItem->setProductId($SQLResult[$i]['']);
            //$ConfigItem->setType($SQLResult[$i]['']);
            //$ConfigItem->setIsPreSelected($SQLResult[$i]['']);
            //$ConfigItem->setIsRecommended($SQLResult[$i]['']);
            //$ConfigItem->setInheritProductName($SQLResult[$i]['']);
            //$ConfigItem->setInheritProductPrice($SQLResult[$i]['']);
            //$ConfigItem->setShowDiscount($SQLResult[$i]['']);
            //$ConfigItem->setShowSurcharge($SQLResult[$i]['']);
            //$ConfigItem->setIgnoreMultiplier($SQLResult[$i]['']);
            //$ConfigItem->setMinQuantity($SQLResult[$i]['']);
            //$ConfigItem->setMaxQuantity($SQLResult[$i]['']);
            //$ConfigItem->setInitialQuantity($SQLResult[$i]['']);
            //$ConfigItem->setSort($SQLResult[$i]['']);
            //$ConfigItem->setVat($SQLResult[$i]['']);
            
            /* ConfigItemI18n */
            $ConfigItemI18n = new ConfigItem\ConfigItemI18n;
            //$ConfigItemI18n->setConfigItemId($SQLResult[$i]['']);
            //$ConfigItemI18n->setLocaleName($SQLResult[$i]['']);
            //$ConfigItemI18n->setName($SQLResult[$i]['']);
            //$ConfigItemI18n->setDescription($SQLResult[$i]['']);
            
            /* ConfigItemPrice */
            $ConfigItemPrice = new ConfigItem\ConfigItemPrice;
            //$ConfigItemPrice->setConfigItemId($SQLResult[$i]['']);
            //$ConfigItemPrice->setCustomerGroupId($SQLResult[$i]['']);
            //$ConfigItemPrice->setPrice($SQLResult[$i]['']);
            //$ConfigItemPrice->setType($SQLResult[$i]['']);
            
            $ConfigItems->ConfigItem[$i] = $ConfigItem;
            $ConfigItems->ConfigItemI18n[$i] = $ConfigItemI18n;
            $ConfigItems->ConfigItemPrice[$i] = $ConfigItemPrice;
        }

        return $ConfigItems;
    }

    /**
     * Schreibe Konfigurationsartikel in Oxid-Shop
     * @return null
     */
    public function setConfigItems() {
        return Null;
    }
}
