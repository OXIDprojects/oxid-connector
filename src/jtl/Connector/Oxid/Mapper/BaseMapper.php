<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Core\Database\Mysql;
use jtl\Core\Utilities\Date as DateUtil;
use jtl\Core\Utilities\Language as LangUtil;
use jtl\Connector\Oxid\Config\Loader\Config;


class BaseMapper 
{
    protected $_model;
    protected $_config;
    protected $_db;
    
    public function __construct()
    {      
        $this->_db = Mysql::getInstance();
    }
    
    /**
     * map db data to model properties
     * @param unknown $data
     */
    private function map($data)
    {
        foreach($this->_config['mapPull'] as $host => $endpoint) 
        {
            $value = null;
            $value = isset($data[$endpoint]) ? $data[$endpoint] : (isset($this->_config['shopConfig'][$endpoint]) ? $this->_config['shopConfig'][$endpoint] : $endpoint);
            
            if(method_exists(get_class($this),$host))
            {
                $value = $this->$host($data);	    
            }
            
            $this->_model->$host = $value;
        }
    }
    
    /**
     * generate wawi model from shop data 
     * @param unknown $data
     */
    public function generate($data)
    {
        $this->_model = new $this->_config['model']();
        
        $this->map($data);
        
        return $this->_model;
    }
    
    /**
     * map from wawi to shop
     * @param unknown $data
     * @return \stdClass
     */
    public function mapDB($data)
    {
        $dbObj = new \stdClass();
        
        
        foreach($this->_config['mapPush'] as $endpoint => $host) 
        {
            if(!empty($endpoint))
            {
                $dbObj->$endpoint = isset($data->$host) ? $data->$host : null;   
            }
		    
            if(method_exists(get_class($this),$endpoint))
            {
                $dbObj->$endpoint = $this->$endpoint($data);
            }
 		}
        
        return $dbObj;
    }
   
    /**
     * fetch all entries from db and fill container or return array of models
     * @param string $container
     * @param string $type
     * @param unknown $params
     * @return unknown
     */  
    public function fetchAll($container=null,$type=null,$params=array())
    {       
        foreach ($params as $key => $value)
        {
            $this->_config[$key] = $value;
        }
        
        if(isset($this->_config['data']))
        {
            $dbResult[] = $this->_config['data'];
        }
        else
        {
            $this->_db = Mysql::getInstance();
            $query = isset($this->_config['query']) ? $this->_config['query'] : 'SELECT * FROM '.$this->_config['table'];
            $dbResult = $this->_db->query($query);
        }
        
        $return = array();
        
        foreach($dbResult as $data)
        {
            $model = $this->generate($data);
            
            if(isset($container))
            {                                    
                $container->add($type, $model->getPublic(), false);
            }
            else
            {
                $return[] = $model;
            }
        }
        if(isset($container))
        {
            return $dbResult;
        }
    }
    
    public function fetchCount() {	    	
	    $objs = $this->_db->query("SELECT count(*) as count FROM {$this->_config['table']} LIMIT 1", array("return" => "object"));
        
        if ($objs !== null) {
	        return intval($objs[0]->count);
	    }
        
	    return 0;
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
        
        $SQLResult = $this->_db->query(" SELECT DECODE(OXVARVALUE, '{$OxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
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
        
        $SQLResult = $this->_db->query(" SELECT DECODE(OXVARVALUE, '{$OxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
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
            $this->array_put_to_position($LanguageResult['aLanguages'][$key], $LanguageResult["aLanguageParams"][$key], 0, "name");
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
        $LangUtil = new LangUtil();  
        
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
    function generateUId()
    {
        return substr( md5( uniqid( '', true ).'|'.microtime() ), 0, 32 );
    }
}