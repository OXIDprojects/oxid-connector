<?php
Namespace jtl\Connector\Oxid\Mapping\Globals;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Globals;

require_once("../../Database/Database.php");
require_once("../../Classes/Globals/GlobalsConf.inc.php");
require_once("Companies.php");
require_once("CustomerGroups.php");
require_once("Manufacturers.php");
require_once("ProductTypes.php");
require_once("Specifics.php");
require_once("Taxs.php");
require_once("Warehouses.php");

Class Globales {

    public $Companies = array();
    public $CustomerGroups = array();
    public $Manufacturers = array();
    public $ProductTypes = array();
    public $Specifics = array();
    public $Taxs = array();
    public $Warehouses = array();
    public $CrossSellingGroups = array();
    public $Currencys = array();
    public $DeliveryStatuse = array();
    public $Languages = array();
    public $ShippingClasses = array();
    public $Units = array();
    
    //Globales
    function setGlobales() {
        
    }
    
    function getGlobales() {
        $Globales = New Globales;
        
        $Globales->Companies = $Globales->getCompanies();
        $Globales->CustomerGroups = $Globales->getCustomerGroups();
        $Globales->Manufacturers = $Globales->getManufacturers();
        $Globales->ProductTypes = $Globales->getProductTypes();
        $Globales->Specifics = $Globales->getSpecifics();
        $Globales->Taxs = $Globales->getTaxs();
        $Globales->Warehouses = $Globales->getWarehouses();
		$Globales->CrossSellingGroups = $Globales->getCrossSellingGroups();
		$Globales->Currencys = $Globales->getCurrencys();
		$Globales->DeliveryStatuse = $Globales->getDeliveryStatuse();
		$Globales->Languages = $Globales->getLanguages();
		$Globales->ShippingClasses = $Globales->getShippingClasses();
		$Globales->Units = $Globales->getUnits();
		
		return $Globales;
    }
    
    //Company
    function setCompanies() {
        
    }
    
    function getCompanies() {
        $Companies = new Companies;
        
        return $Companies->getCompanies();
    }
    
    //CustomerGroup
    function setCustomerGroups() {
        
    }
    
    function getCustomerGroups() {
        $CustomerGroups = new CustomerGroups;
        
        return $CustomerGroups->getCustomerGroups();
    }
    
    //Manufacturer
    function setManufacturers() {
        
    }
       
    function getManufacturers() {
        $Manufacturers = new Manufacturers;
        
        return $Manufacturers->getManufacturers();
    }
    
    
    //ProductType
    function setProductTypes() {
        
    }
    
    function getProductTypes() {
        $ProductTypes = new ProductTypes;
               
        return $ProductTypes->getProductTypes();
    }
    
    //Specific
    function setSpecifics() {
        
    }
    
    function getSpecifics() {
        $Specifics = new Specifics;
        
        return $Specifics->getSpecifics();
    }
    
    //Tax
    function setTaxs() {
        
    }
    
    function getTaxs() {
        $Taxs = new Taxs;
        
        return $Taxs->getTaxs();
    }
    
    //Warehouse
    function setWarehouses() {
        
    }
    
    function getWarehouses() {
        $Warehouses = new Warehouses;
        
        return $Warehouses->getWarehouses();
    }
    
    //CrossSellingGroup
    function setCrossSellingGroups() {
		
	}
	
	function getCrossSellingGroups() {
		return "";
	}
	
	//Currency
	function setCurrencys() {
	
	}
	
	function getCurrencys() {
	    return "";
	}
	
	//DeliveryStatus
	function setDeliveryStatuse() {
	
	}
	
	function getDeliveryStatuse() {
	    return "";
	}
	
	//Language
	function setLanguages() {
	
	}
	
	function getLanguages() {
	    return "";
	}
	
	//ShippingClasse
	function setShippingClasses() {
	
	}
	
	function getShippingClasses() {
	    return "";
	}
	
	//Unit
	function setUnits() {
	
	}
	
	function getUnits() {
	    return "";
	}
    
    
}

//Testausgabe
$Globales = New Globales;
$result = $Globales->getGlobales();

echo "<pre>";
print_r($result);
echo "</pre>";

?>
<a href="http://localhost/">Zur&uuml;ck</a>