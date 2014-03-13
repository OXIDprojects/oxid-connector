<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Core\Database\Mysql;
use jtl\Connector\Oxid\Config\Loader\Config;

class BaseMapper 
{
    protected $_model;
    protected $_config;
    protected $_db;
    
    private function map($data)
    {
        foreach($this->_config['mapPull'] as $wawi => $shop)
        {
            $this->_model->$wawi = isset($data[$shop]) ? $data[$shop] : (isset($this->_config['shopConfig'][$shop]) ? $this->_config['shopConfig'][$shop] : $shop);
            
            if(method_exists(get_class($this),$wawi))
            {
                $this->_model->$wawi = $this->$wawi($data);
            }
        }
    }
    
    public function __construct()
    {
        //$shopConfig = new Config();
        
        $this->_db = Mysql::getInstance();
        //$this->_config['shopConfig'] = new Config();
    }
    
    public function generate($data)
    {
        $this->_model = new $this->_config['model']();
        
        $this->map($data);
        
        return $this->_model;
    }
    
    public function mapDB($data)
    {
        $dbObj = new \stdClass();
        
        foreach($this->_config['mapPush'] as $shop => $wawi)
        {
            if(!empty($shop))
            {
                $dbObj->$shop = isset($data->$wawi) ? $data->$wawi : null;
            }
            
            if(method_exists(get_class($this),$shop))
            {
                $dbObj->$shop($data);
            }
        }
        
        return $dbObj;
    }
    
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
                $container->add($type, $model->getPublic(array('_fields')));
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
    
    //ToDo Herr Berger!!!
    public function fetchCount() {	    	
	    //$objs = $this->_db->query("SELECT count(*) as count FROM {$this->_config['table']} LIMIT 1", array("return" => "object"));
        
        $objs = $this->_db->query("SELECT count(*) as count FROM oxarticles LIMIT 1", array("return" => "object"));
        
        die(print_r($objs));
        
	    if ($objs !== null) {      
            return intval($objs[0]->count);
	    }
        
	    return 0;
	}
    
    
    /**
     * Summary of checkEnterNetPrice
     * Pr�fe ob Option "Artikelpreise netto eingeben" gesetzt ist
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
     * Pr�fe ob Option "Nettopreise Anzeigen" gesetzt ist (B2B)
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
     * Gibt den hinterlegten Standard MwSt-Satz zur�ck
     * @return DefaultVat Integer
     */
    public function getDefaultVAT()
    {   
        return $this->getConfigFile('dDefaultVAT');
    }
    
    
    /**
     * Summary of getConfigFile
     * Gibt aus der Oxid-Konfig-Tabelle
     * das BLOB Feld unverschl�sselt zur�ck.
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
     * Summary of getLanguageIDs
     * @return array
     */
    public function getLanguageIDs()
    {   
        $OxidConf = new Config();        
                
        $SQLResult = $this->_db->query(" SELECT DECODE(OXVARVALUE, '{$OxidConf->sConfigKey}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                 " WHERE OXVARNAME = 'aLanguages' OR OXVARNAME = 'aLanguageParams' ");
        
        //Blob Felder aus OXCONFIG Tabelle Deserialisieren und in Array schreiben
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
        
        //Migrieren der "aLanguageParams" in die "aLanguages"
        foreach ($LanguageResult['aLanguages'] as $key => $value)
        {                   
            $this->array_put_to_position($LanguageResult['aLanguages'][$key], $LanguageResult["aLanguageParams"][$key], 0, "name");
        }
        
        //Nach Migration "aLanguageParams" aus Array schmei�en
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
            // F�ge neues Objekt hinzu
            if ($count == $position)
            {   
                if (!$name) $name = $count;
                $return[$name] = $object;
                $inserted = true;
            }   
            // F�ge altes Objekt hinzu
            $return[$k] = $v; 
            $count++;
        }   
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        
        $array = $return;
        
        return $array;
    }    
}