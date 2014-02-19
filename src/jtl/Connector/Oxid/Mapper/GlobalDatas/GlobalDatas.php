<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\GlobalData;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalDataConf.inc.php");
require_once("Companies.php");
require_once("ConfigGroups.php");
require_once("ConfigItems.php");
require_once("CustomerGroups.php");
require_once("FileDownloads.php");
require_once("ProductTypes.php");
require_once("Taxs.php");
require_once("Warehouses.php");

class GlobalDatas {

    public $Companies = array();
    public $ConfigGroups = array();
    public $ConfigItems = array();
    public $CustomerGroups = array();
    public $FileDownloads = array();
    public $ProductTypes = array();
    public $Taxs = array();
    public $Warehouses = array();
    public $CrossSellingGroups = array();
    public $Currencys = array();
    public $DeliveryStatuse = array();
    public $Languages = array();
    public $Shippingclasses = array();
    public $Units = array();
    
    //GlobalDatas    
    public function getGlobalDatas() {
        $GlobalDatas = new GlobalDatas;
        
        $GlobalDatas->Companies = $GlobalDatas->getCompanies();
        $GlobalDatas->ConfigGroups = $GlobalDatas->getConfigGroups();
        $GlobalDatas->ConfigItems = $GlobalDatas->getConfigItems();
        $GlobalDatas->CustomerGroups = $GlobalDatas->getCustomerGroups();
        $GlobalDatas->FileDownloads = $GlobalDatas->getFileDownloads();
        $GlobalDatas->Manufacturers = $GlobalDatas->getManufacturers();
        $GlobalDatas->ProductTypes = $GlobalDatas->getProductTypes();
        $GlobalDatas->Specifics = $GlobalDatas->getSpecifics();
        $GlobalDatas->Taxs = $GlobalDatas->getTaxs();
        $GlobalDatas->Warehouses = $GlobalDatas->getWarehouses();
		$GlobalDatas->CrossSellingGroups = $GlobalDatas->getCrossSellingGroups();
		$GlobalDatas->Currencys = $GlobalDatas->getCurrencys();
		$GlobalDatas->DeliveryStatuse = $GlobalDatas->getDeliveryStatuse();
		$GlobalDatas->Languages = $GlobalDatas->getLanguages();
		$GlobalDatas->Shippingclasses = $GlobalDatas->getShippingclasses();
		$GlobalDatas->Units = $GlobalDatas->getUnits();
		
		return $GlobalDatas;
    }
    
    public function setGlobalDatas() {
        
    }
    
    //Companies
    public function getCompanies() {
        $Companies = new Companies;
        
        return $Companies->getCompanies();
    }
    
    public function setCompanies() {
        
    }
    
    //ConfigGroups
    public function getConfigGroups() {
        $ConfigGroups = new ConfigGroups;
        
        return $ConfigGroups->getConfigGroups();
    }
    
    public function setConfigGroups() {
        
    }
    
    //ConfigItems
    public function getConfigItems() {
        $ConfigItems = new ConfigItems;
        
        return $ConfigItems->getConfigItems();
    }
    
    public function setConfigItems() {
        
    }
    
    //CustomerGroup
    public function getCustomerGroups() {
        $CustomerGroups = new CustomerGroups;
        
        return $CustomerGroups->getCustomerGroups();
    }
    
    public function setCustomerGroups() {
        
    }
    
    //FileDownload
    public function getFileDownloads() {
        $FileDownloads = new FileDownloads;
        
        return $FileDownloads->getFileDownloads();
    }
    
    public function setFileDownloads() {
        
    }
    
    //Manufacturer
    public function getManufacturers() {
        $Manufacturers = new Manufacturers;
        
        return $Manufacturers->getManufacturers();
    }
    
    public function setManufacturers() {
        
    }
    
    
    //ProductType
    public function getProductTypes() {
        $ProductTypes = new ProductTypes;
               
        return $ProductTypes->getProductTypes();
    }
    
    public function setProductTypes() {
        
    }
    
    //Specific
    public function getSpecifics() {
        $Specifics = new Specifics;
        
        return $Specifics->getSpecifics();
    }
    
    public function setSpecifics() {
        
    }
    
    //Tax    
    public function getTaxs() {
        $Taxs = new Taxs;
        
        return $Taxs->getTaxs();
    }
    
    public function setTaxs() {
        
    }
    
    //Warehouse
    public function getWarehouses() {
        $Warehouses = new Warehouses;
        
        return $Warehouses->getWarehouses();
    }
    
    public function setWarehouses() {
        
    }
    
    //CrossSellingGroup
	public function getCrossSellingGroups() {
		
        $database = new Database\Database;
        
        //ToDO: Select Statement für CrossSellingGroups
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCrossSellingGroupclasses($SQLResult);
	}
    
    function fillCrossSellingGroupclasses($SQLResult) {
        $CrossSellingGroups = new CrossSellingGroups;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* CrossSellingGroup */
            $CrossSellingGroup = new GlobalData\CrossSellingGroup;
            //$CrossSellingGroup->setId($SQLResult[$i]['']);
            //$CrossSellingGroup->setLocaleName($SQLResult[$i]['']);
            //$CrossSellingGroup->setName($SQLResult[$i]['']);
            //$CrossSellingGroup->setDescription($SQLResult[$i]['']);
                   
            $CrossSellingGroups->CrossSellingGroup[$i] = $CrossSellingGroup;
        }

        return $ConfigGroups;
    }
    
    public function setCrossSellingGroups() {
		
	}
    
	
	//Currency
	public function getCurrencys() {
	    	
        $database = new Database\Database;
        
        //ToDO: Select Statement für Currency
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillCurrencyclasses($SQLResult);
	}
    
    function fillCurrencyclasses($SQLResult) {
        $Currencys = new Currencys;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* Currency */
            $Currency = new GlobalData\Currency;
            //$Currency->setId($SQLResult[$i]['']);
            //$Currency->setName($SQLResult[$i]['']);
            //$Currency->setISO($SQLResult[$i]['']);
            //$Currency->setNameHtml($SQLResult[$i]['']);
            //$Currency->setFactor($SQLResult[$i]['']);
            //$Currency->setIsDefault($SQLResult[$i]['']);
            //$Currency->setHasCurrencySignBeforeValue($SQLResult[$i]['']);
            //$Currency->setDelimiterCent($SQLResult[$i]['']);
            //$Currency->setDelimiterThousand($SQLResult[$i]['']);
                   
            $Currencys->Currency[$i] = $Currency;
        }

        return $Currencys;
	}
    
    public function setCurrencys() {
        
	}
	
	//DeliveryStatus
    public function getDeliveryStatuse() {
        
        $database = new Database\Database;
        
        //ToDO: Select Statement für Currency
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillDeliveryStatusclasses($SQLResult);
	}
    
    function fillDeliveryStatusclasses($SQLResult) {
        $DeliveryStatuse = new DeliveryStatuse;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* DeliveryStatus */
            $DeliveryStatus = new GlobalData\DeliveryStatus;
            //$DeliveryStatus->setId($SQLResult[$i]['']);
            //$DeliveryStatus->setLocaleName($SQLResult[$i]['']);
            //$DeliveryStatus->setName($SQLResult[$i]['']);
                   
            $DeliveryStatuse->DeliveryStatus[$i] = $DeliveryStatus;
        }

        return $DeliveryStatuse;
	}
    
    public function setDeliveryStatuse() {
        
	}
	
	//Language	
	public function getLanguages() {
        
        $database = new Database\Database;
        
        //ToDO: Select Statement für Language
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillLanguageclasses($SQLResult);
	}
    
    function fillLanguageclasses($SQLResult) {
        $Languages = new Languages;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* Language */
            $Language = new GlobalData\Language;
            //$Language->setId($SQLResult[$i]['']);
            //$Language->setNameEnglish($SQLResult[$i]['']);
            //$Language->setNameGerman($SQLResult[$i]['']);
            //$Language->setLocaleName($SQLResult[$i]['']);
            //$Language->setIsDefault($SQLResult[$i]['']);
            
            $Languages->Language[$i] = $Language;
        }

        return $Languages;
	}
    
    public function setLanguages() {
        
	}
	
	//Shippingclass	
	public function getShippingclasses() {
	            
        $database = new Database\Database;
        
        //ToDO: Select Statement für Shippingclass
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillShippingclassclasses($SQLResult);
	}
    
    function fillShippingclassclasses($SQLResult) {
        $Shippingclasses = new Shippingclasses;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* Language */
            $Shippingclass = new GlobalData\Shippingclass;
            //$Shippingclass->setId($SQLResult[$i]['']);
            //$Shippingclass->setName($SQLResult[$i]['']);
            
            $Shippingclasses->Shippingclass[$i] = $Shippingclass;
        }

        return $Shippingclasses;
	}
    
    public function setShippingclasses() {
        
	}
	
	//Unit	
	public function getUnits() {
        
        $database = new Database\Database;
        
        //ToDO: Select Statement für Unit
        $query = "SELECT * " .
                " FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillUnitclasses($SQLResult);
	}
    
    function fillUnitclasses($SQLResult) {
        $Units = new Units;
        
        for ($i = 0; $i < count($SQLResult); ++$i) {
            
            /* Language */
            $Unit = new GlobalData\Unit;
            //$Unit->setId($SQLResult[$i]['']);
            //$Unit->setLocaleName($SQLResult[$i]['']);
            //$Unit->setName($SQLResult[$i]['']);
            
            $Units->Unit[$i] = $Unit;
        }

        return $Units;
	}
    
    public function setUnits() {
        
	}
}

//Testausgabe
$GlobalDatas = new GlobalDatas;
$result = $GlobalDatas->getGlobalDatas();

echo "<pre>";
print_r($result);
echo "</pre>";


<a href="http://localhost/">Zur&uuml;ck</a>