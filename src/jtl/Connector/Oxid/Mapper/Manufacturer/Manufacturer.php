<?php
namespace jtl\Connector\Oxid\Mapper\Manufacturer;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Mapper\Manufacturer\ManufacturerI18n as ManufacturerI18nMapper;

use jtl\Connector\ModelContainer\ManufacturerContainer;
use jtl\Connector\Result\Transaction as TransactionResult;

class Manufacturer extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Manufacturer",
            "table" => "oxmanufacturers",
            "pk" => "OXID",
            "mapPull" => array
            (
                "_id" => "OXID",
                "_name" => "OXTITLE"
            ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXTITLE" => "_name"
            )
        );
    
    public function fetchAll($container=null,$type=null,$params=array()) {
        $result = [];
        
        $dbResult = $this->_db->query('SELECT * FROM oxmanufacturers ORDER BY oxmanufacturers.OXID LIMIT '.$params['offset'].','.$params['limit']);
        
        foreach($dbResult as $data) {
    	    $container = new ManufacturerContainer();
    		
    		$model = $this->generate($data);
    		
    		$container->add('manufacturer', $model->getPublic(),false);
    		
    		//add i18n
    		$manufacturerI18nMapper = new ManufacturerI18nMapper();
            $manufacturerI18nMapper->fetchAll($container, 'manufacturerI18n', $manufacturerI18nMapper->getManufacturerI18n(array('OXID' => $model->_id)));
            
            $result[] = $container->getPublic(array('items'));
    	} 
        return $result;
    }
    
    public function updateAll($container,$trid=null) {
        $result = new TransactionResult();
        
        $manufacturer = $container->getMainModel();
        $identity = $manufacturer->getId();
        
        $obj = $this->mapDB($manufacturer);
        
        if(!empty($obj->manufacturers_id)) {
            $this->_db->updateRow($obj, $this->_config['table'],$this->_config['pk'],$obj->manufacturers_id);
        }
        else {
            $insertResult = $this->_db->insertRow($obj, $this->_config['table']);
            $identity->setEndpoint($insertResult->getKey());
        }
        
        $result->setId($identity);
        
        return $result;
    } 
}

/* non mapped properties
Manufacturer:
 * _www
 * _sort 
 * _urlPath
 */