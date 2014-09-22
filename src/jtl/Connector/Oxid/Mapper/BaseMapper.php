<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Core\Database\Mysql;
use jtl\Core\Utilities\Date;
use jtl\Core\Utilities\Language;
use jtl\Connector\Model\Identity;

use jtl\Connector\Oxid\Config\Loader\Config;


class BaseMapper 
{
    protected $db;
	protected $type;
	protected $model;
    protected $shopConfig;
    protected $mapperConfig;
	protected $sqlite = null;
    
    public function __construct()
    {      
        $reflect = new \ReflectionClass($this);
        
        $this->type = null;
        $this->shopConfig = new Config();
        $this->db = Mysql::getInstance();
        $this->model = "\\jtl\\Connector\\Model\\".$reflect->getShortName();
    }
    
    /**
     * Generate model from db data
     * @param array $data
     * @return object
     */
    public function generateModel($data) { 
	    $model = new $this->model();
        
		if(!$this->type) $this->type = $model->getModelType();

		foreach($this->mapperConfig['mapPull'] as $host => $endpoint) {
		    $value = null;
            
		    if($this->type->getProperty($host)->isNavigation()) {
		        list($endpoint,$setMethod) = explode('|',$endpoint);
		        
		        $subMapperClass = "\\jtl\\Connector\\Oxid\\Mapper\\".$endpoint;
                
		        if(!class_exists($subMapperClass)) throw new \Exception("There is no mapper for ".$endpoint);
		        else {
		            if(!method_exists($model,$setMethod)) throw new \Exception("Set method ".$setMethod." does not exists");
                    
		            $subMapper = new $subMapperClass();
                    
                    $values = $subMapper->pull($data);
                    
		            foreach($values as $obj) $model->$setMethod($obj);
		        }
		    } 
            else {
		        if(isset($data[$endpoint])) $value = $data[$endpoint];
		        elseif(method_exists(get_class($this),$host)) $value = $this->$host($data);
		        //else throw new \Exception($this->model.": There is no property or method to map ".$host);
                else $value = '';
                
		        if($this->type->getProperty($host)->isIdentity()) $value = new Identity($value);
                else {
		            $type = $this->type->getProperty($host)->getType();
                    
                    if(!is_null($value)) {
		                if($type == "DateTime" && !is_null($value)) $value = new \DateTime($value);
		                else settype($value,$type);
                    }
                }
   
                $setMethod = 'set'.ucfirst($host);
                $model->$setMethod($value);
		        }
   		    }
            if(method_exists(get_class($this),'addData')) $this->addData($model,$data);
            return $this->type->isMain() ? $model->getPublic() : $model;    
        }
    
    /**
     * map from model to db object
     * @param unknown $data
     * @param string $parentDbObj
     * @throws \Exception
     * @return multitype:NULL
     */
	public function generateDbObj($data,$parentDbObj,$parentObj=null,$addToParent=false) {
        $return = [];
	    if(!is_array($data)) $data = array($data);
	    
	    foreach($data as $obj) {
	        $subMapper = [];
	        
    	    $model = new $this->model();	
            
    	    if(!$this->type) $this->type = $model->getModelType();
    	    
    	    $dbObj = new \stdClass();
            $preMapper = null;
            
    		foreach($this->mapperConfig['mapPush'] as $endpoint => $host) {
    		    if(is_null($host) && method_exists(get_class($this),$endpoint)) {
    		        $dbObj->$endpoint = $this->$endpoint($obj,$model,$parentObj);
    		    }
    		    elseif($this->type->getProperty($host)->isNavigation()) {
                    if (substr_count($endpoint,'|') > 1) {
                        list($preEndpoint,$preNavSetMethod,$preMapper) = explode('|',$endpoint);    
                    } else {
                        list($preEndpoint,$preNavSetMethod) = explode('|',$endpoint);    
                    }
    		        
    		        if($preMapper) {
    		            $preSubMapperClass = "\\jtl\\Connector\\Oxid\\Mapper\\".$preEndpoint;
    		            
    		            if(!class_exists($preSubMapperClass)) throw new \Exception("There is no mapper for ".$host);
    		            else {
    		                $preSubMapper = new $preSubMapperClass();
                            
    		                $values = $preSubMapper->push($obj,$dbObj);
                            
    		                foreach($values as $setObj) $model->$preNavSetMethod($setObj);
    		            }
    		        }
    		        else $subMapper[$endpoint] = $host;    		       
    		    }
    		    else {
    		        $value = null;
    		        
		            $getMethod = 'get'.ucfirst($host);
		            $setMethod = 'set'.ucfirst($host);
                    $value = $obj->$getMethod();
        		    
        		    if(isset($value)) {
        		        if($this->type->getProperty($host)->isIdentity()) {
        		            $model->$setMethod($value);
        		            
        		            $value = $value->getEndpoint();
        		        }
        		        else {
        		            $type = $this->type->getProperty($host)->getType();
        		            if($type == "DateTime") $value = $value->format('Y-m-d H:i:s');
        		            elseif($type == "bool") settype($value,"integer");
        		        }		       
        		    }
        		    else throw new \Exception("There is no property or method to map ".$endpoint);
                    
        		    if(!empty($value)) $dbObj->$endpoint = $value;
    		    }	    		    
    		}
            if(!$addToParent) {
                
    		    switch($obj->getAction()) {
        		    case 'complete':
        		        if(isset($this->mapperConfig['where'])) {
        		            $whereKey = $this->mapperConfig['where'];
        		            $whereValue = $dbObj->{$this->mapperConfig['where']};
        		        
        		            if(is_array($whereKey)) {
        		                $whereValue = [];
        		                foreach($whereKey as $key) {
        		                    $whereValue[] = $dbObj->{$key};
        		                }
        		            }
        		        
        		            $insertResult = $this->db->deleteInsertRow($dbObj,$this->mapperConfig['table'],$whereKey,$whereValue);
        		            
        		            if(isset($this->mapperConfig['identity'])) {
        		                $obj->{$this->mapperConfig['identity']}()->setEndpoint($insertResult->getKey());
        		            }
        		        }
        		    break;
        		
        		    case 'insert':
        		        $insertResult = $this->db->insertRow($dbObj,$this->mapperConfig['table']);
        		        
        		        if(isset($this->mapperConfig['identity'])) {
        		            $obj->{$this->mapperConfig['identity']}()->setEndpoint($insertResult->getKey());    		            
        		        }
        		    break;
        		
        		    case 'update':
        		        if(isset($this->mapperConfig['where'])) {
            		        $whereKey = $this->mapperConfig['where'];
            		        $whereValue = $dbObj->{$this->mapperConfig['where']};
            		
            		        if(is_array($whereKey)) {
            		            $whereValue = [];
            		            foreach($whereKey as $key) {
            		                $whereValue[] = $dbObj->{$key};
            		            }
            		        }
            		        
            		        $this->db->updateRow($dbObj,$this->mapperConfig['table'],$whereKey,$whereValue);
        		        }
        		    break;
        		
        		    case 'delete':
        		        if(isset($this->mapperConfig['where'])) {
        		            $whereKey = $this->mapperConfig['where'];
        		            $whereValue = $dbObj->{$this->mapperConfig['where']};
        		        
        		            if(is_array($whereKey)) {
        		                $whereValue = [];
        		                foreach($whereKey as $key) {
        		                    $whereValue[] = $dbObj->{$key};
        		                }
        		            }
        		        
        		            $this->db->deleteRow($dbObj,$this->mapperConfig['table'],$whereKey,$whereValue);
        		        }        		   
        		    break;
        		}
        		
        		//if($obj->getAction()) var_dump($dbObj);
    		}
    		else {	
    		    foreach($dbObj as $key => $value) {
    		        $parentDbObj->$key = $value;
    		    }  	    
    		}
            
    		// sub mapper
		    foreach($subMapper as $endpoint => $host) {
		        list($endpoint,$navSetMethod) = explode('|',$endpoint);
		        
		        $subMapperClass = "\\jtl\\Connector\\Oxid\\Mapper\\".$endpoint;
		        
		        if(!class_exists($subMapperClass)) throw new \Exception("There is no mapper for ".$host);
		        else {
		            $subMapper = new $subMapperClass();
                    
		            $values = $subMapper->push($obj);
                    
		            foreach($values as $setObj) $model->$navSetMethod($setObj);
		        }
		    }
		    
            $return[] = $model->getPublic();		
	    }
		
	    return is_array($data) ? $return : $return[0];
	}
    
    /**
     * Default pull method
     * @param array $data
     * @param integer $offset
     * @param integer $limit
     * @return array
     */  
	public function pull($parentData=null,$offset=0,$limit=null) {
        $limitQuery = isset($limit) ? ' LIMIT '.$offset.','.$limit : '';
        
	    if(isset($this->mapperConfig['query'])) {
	        if(!is_null($parentData)) { 
	           $query = preg_replace_callback(
	               '/\[\[(\w+)\]\]/',
    	           function ($match) use ($parentData) {
    	               return $parentData[$match[1]];
    	           },
    	           $this->mapperConfig['query']
	           );
	        }
	        else $query = $this->mapperConfig['query'];
	        
	        $query .= $limitQuery;	        
	    }
	    else $query = 'SELECT * FROM '.$this->mapperConfig['table'].$limitQuery;
        
	    $dbResult = $this->db->query($query);
        
	    $return = array();
		
		foreach($dbResult as $data) {
			$return[] = $this->generateModel($data);
		}
        
		return $return;
	}
    
    /**
     * Default push method
     * @param unknown $data
     * @param string $dbObj
     * @return multitype:NULL
     */
    public function push($data,$dbObj=null) {
	    $parent = null;
        
        if($data->getAction() == 'complete' && method_exists(get_class($this),'complete')) $this->complete($data);	    
	    
	    if(isset($this->mapperConfig['getMethod'])) {
	        $subGetMethod = $this->mapperConfig['getMethod'];
	        $parent = $data;
	        $data = $data->$subGetMethod();	       
	    }
	    
	    $return = $this->generateDbObj($data,$dbObj,$parent);
	    
	    return $return;
	}
    
    /**
     * Default statistics
     * @return number
     */
	public function statistic() {	    	
	    $objs = $this->db->query("SELECT count(*) as count FROM {$this->mapperConfig['table']} LIMIT 1", array("return" => "object"));
        
	    return $objs !== null ? intval($objs[0]->count) : 0;
	}
    
    /**
     * Get sqlite instance of setup db
     * @return \PDO 
     */
	public function getSqlite() {
	    if(is_null($this->sqlite)) $this->sqlite = new \PDO('sqlite:'.realpath(__DIR__.'/../../Oxid/').'/connector.sdb');
	    
	    return $this->sqlite;
	}
    
    /**
     * Summary of checkEnterNetPrice
     * Prüfe ob Option "Artikelpreise netto eingeben" gesetzt ist
     * @return Boolean
     */
    public function checkEnterNetPrice()
    {   
        if($this->getConfigFile('blEnterNetPrice') == 1)
        {
            return true;
        }   
        return false;
    }
    
    
    /**
     * Summary of checkShowNetPrice
     * Prüfe ob Option "Nettopreise Anzeigen" gesetzt ist (B2B)
     * @return Boolean
     */
    public function checkShowNetPrice()
    {   
        if($this->getConfigFile('blShowNetPrice') == 1)
        {
            return true;
        }   
        return false;
    }
    
    
    /**
     * Summary of getDefaultVAT
     * Gibt den hinterlegten Standard MwSt-Satz zurück
     * @return DefaultVat Integer
     */
    public function getDefaultVAT()
    {   
        return $this->getConfigFile('dDefaultVAT');
    }
    
    /**
     * Summary of getConfigFile
     * Gibt aus der Oxid-Konfig-Tabelle
     * das BLOB Feld unverschlüsselt zurück.
     * @param $OxVarName
     * @return BLOB
     */
    public function getConfigFile($OxVarName)
    {
        $OxidConf = new Config();
        
        $SQLResult = $this->db->query(" SELECT DECODE(OXVARVALUE, '{$OxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                                       " WHERE OXVARNAME = '{$OxVarName}'");
        
        return $SQLResult[0]['OXVARVALUEDECODED'];
    }
    
    /**
     * Summary of stringToDateTime
     * Formatiert einen TimeString
     * zu einem DateTime um.
     * @param $string
     * @return $dateTime
     */
    public function stringToDateTime($string)
    {
        
        $dateTime = (new \DateTime($string))->format('c');
        if($dateTime == "-001-11-30T00:00:00+01:00")
        {
            return null;
        }else{
            return $dateTime;
        }
    }

    
    
    /**
     * Summary of getLanguageIDs
     * @return array
     */
    public function getLanguageIDs()
    {   
        $OxidConf = new Config();        
        
        $SQLResult = $this->db->query(" SELECT DECODE(OXVARVALUE, '{$OxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                 " WHERE OXVARNAME = 'aLanguages' OR OXVARNAME = 'aLanguageParams' ");
               
        for ($i = 0; $i < count($SQLResult); $i++)
        {
            switch ($i)
            {
                case 0:
                    $VarName = "aLanguages";
                    break;
                case 1:
                    $VarName = "aLanguageParams";
                    break;
                default:
                    $VarName = "No VarName";
                    break;
            }
            
            $LanguageResult[$VarName] = unserialize($SQLResult[$i]['OXVARVALUEDECODED']);           
        }
        
        foreach ($LanguageResult['aLanguages'] as $key => $value)
        {
            $LanguageResult['aLanguages'][$key] = array_merge($LanguageResult['aLanguages'][$key], array("code"=>$key));
            
            if (array_key_exists('No VarName', $LanguageResult))
            {    
                $this->array_put_to_position($LanguageResult['aLanguages'][$key], $LanguageResult['No VarName'][$key], 0, "name");
            } else {
                $this->array_put_to_position($LanguageResult['aLanguages'][$key], $LanguageResult['aLanguageParams'][$key], 0, "name");
            }
        }
        
        unset($LanguageResult["aLanguageParams"]);
        
        return $LanguageResult['aLanguages'];
    }
    
    
    /**
     * Summary of array_put_to_position
     * @param $array
     * @param $object
     * @param $position
     * @param $name
     * @return $array
     */
    protected function array_put_to_position(&$array, $object, $position, $name = null)
    {
        $count = 0;
        $return = array();
        foreach ($array as $k => $v) 
        {
            if ($count == $position)
            {
                if (!$name) $name = $count;
                $return[$name] = $object;
                $inserted = true;
            }
            $return[$k] = $v; 
            $count++;
        }
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        
        $array = $return;
        
        return $array;
    }
    
    /**
     * Summary of getLocalCode
     * @param $localCode
     * @return $localCode
     */
    public function getLocalCode($localCode)
    {
        $LangUtil = new \jtl\Core\Utilities\Language();  
        
        $localCode = $LangUtil->map("", $localCode);
        
        if(!$localCode)
        {
            return null;
        }else{
            return $localCode;
        }
        
    }
    
    /**
     * Returns generated unique ID.
     * @return string
     */
    public function generateUId()
    {
        return substr( md5( uniqid( '', true ).'|'.microtime() ), 0, 32 );
    }
    
    /**
     * Returns Deafult CustomerGroup ID
     * @return String
     */
    public function getDefaultCustomerGroupId()
    {      
        return 'oxidnotyetordered';
    }
    
    /**
     * Returns UCUM Code 0
     *      Or Unit Display Code 1 
     *      Or WaWi Unit Descriptive Name 2
     * @return String
     */
    public function getUnitCode($OxUnitName, $UnitOption = 0)
    {       
        switch ($OxUnitName) {
            
            case '_UNIT_MM':
                $UCUM = 'mm';
                $displayCode = 'mm';
                $descriptiveName = 'MilliMeter';
                break;
            
            case '_UNIT_CM':
                $UCUM = 'cm';
                $displayCode = 'cm';
                $descriptiveName = 'CentiMeter';
                break;
            
            case '_UNIT_M':
                $UCUM = 'm';
                $displayCode = 'm';
                $descriptiveName = 'Meter';
                break;
            
            case '_UNIT_M2':
                $UCUM = 'm2';
                $displayCode = 'm^2';
                $descriptiveName = 'SquareMeter';
                break;
                       
            case '_UNIT_ML':
                $UCUM = 'mL';
                $displayCode = 'ml';
                $descriptiveName = 'MilliLiter';
                break;
            
            case '_UNIT_L':
                $UCUM = 'L';
                $displayCode = 'l';
                $descriptiveName = 'Liter';
                break;
                
            case '_UNIT_M3':
                $UCUM = 'm3';
                $displayCode = 'm^3';
                $descriptiveName = 'CubicMeter';
                break;
            
            case '_UNIT_G':
                $UCUM = 'g';
                $displayCode = 'g';
                $descriptiveName = 'Gram';
                break;
            
            case '_UNIT_KG':
                $UCUM = 'kg';
                $displayCode = 'kg';
                $descriptiveName = 'KiloGram';
                break;
            
            case '_UNIT_PIECE':
                $UCUM = 'Piece';
                $displayCode = 'Piece';
                $descriptiveName = 'Piece';
                break;
            
            case '_UNIT_ITEM':
                $UCUM = 'Part';
                $displayCode = 'Part';
                $descriptiveName = 'Part';
                break;
            
            default:
                $UCUM = $OxUnitName;
                $displayCode = $OxUnitName;
                $descriptiveName = $OxUnitName;
        }
        
        switch ($UnitOption) {
        
            case 0:
                return $UCUM;
                break;
                
            case 1:
                return $displayCode;
                break;
                
            case 2:
                return $descriptiveName;
                break;
                
            default:
                return $OxUnitName;
                break;
        }
    }
    
     /**
     * Summary of getProdVarArray
     * @param $data
     * @param $langBaseId
     * @return Array
     */
    public function getProdVarArray($data, $langBaseId) {
        if ($langBaseId == 0) {
            foreach ($data as $value)
            {
                if (!empty($value['OXVARNAME'])) {
                    $variantIDs = array_map('trim', explode(' | ', $value['OXVARNAME']));
                } elseif (!empty($value['OXVARSELECT']))
                    $variantValueIDs[] = array_map('trim', explode(' | ', $value['OXVARSELECT']));
            }
            
        } else {
            foreach ($data as $value)
            {
                if (!empty($value["OXVARNAME_{$langBaseId}"])) {
                    $variantIDs = array_map('trim', explode(' | ', $value["OXVARNAME_{$langBaseId}"]));
                } elseif (!empty($value["OXVARSELECT_{$langBaseId}"]))
                    $variantValueIDs[] = array_map('trim', explode(' | ', $value["OXVARSELECT_{$langBaseId}"]));
            }
        }
        
        //Doppelte Einträge löschen
        if(!empty($variantIDs) & !empty($variantValueIDs))
        {
            for ($i = 0; $i < count($variantIDs); $i++)
            {
                foreach ($variantValueIDs as $variantValueID)
                {
                    $newVariantValueIDs[$i][] = $variantValueID[$i];   
                }
                $newVariantValueIDs[$i] = array_values(array_unique($newVariantValueIDs[$i]));
            }
            $newVariantValueIDs = array_combine($variantIDs, $newVariantValueIDs);    
            
            return $newVariantValueIDs;
        } else {
            return null;
        }
    }
}