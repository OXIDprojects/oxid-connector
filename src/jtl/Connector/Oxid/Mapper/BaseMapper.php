<?php
namespace jtl\Connector\Oxid\Mapper;

use \jtl\Core\Database\Mysql;
use \jtl\Connector\Oxid\Config\Loader\Config;

class BaseMapper 
{
    protected $_model;
    protected $_config;
    protected $_db;
    
    private function map($data)
    {
        foreach($this->_config['mapPull'] as $wawi => $shop) 
        {
            $this->_model->$wawi;
            if(method_exists(get_class($this),$wawi))
            {                
                $this->_model->$wawi = $this->wawi($data);
            }
        }
    }
    
    public function __construct()
    {
        $shopConfig = new Config();
        
        $this->_db = Mysql::getInstance();
        $this->_config['shopConfig'] = $shopConfig;
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
            //var_dump($dbResult);
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
    
    
    /**
     * Summary of getLanguageIDs
     * @return array
     */
    public function getLanguageIDs()
    {   
        $OxidConf = new ConfigLoader\Config;
        $OxidConf->getConfigs();
        
        $database = new Database\Database;
        
        $query = " SELECT DECODE(OXVARVALUE, '{$OxidConf->getSConfigKey()}' ) AS OXVARVALUEDECODED FROM oxconfig " .
                 " WHERE OXVARNAME = 'aLanguages' OR OXVARNAME = 'aLanguageParams' ";
        
        $SQLResult = $database->oxidStatement($query);  
        
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
            // insert new object
            if ($count == $position)
            {   
                if (!$name) $name = $count;
                $return[$name] = $object;
                $inserted = true;
            }   
            // insert old object
            $return[$k] = $v; 
            $count++;
        }   
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        $array = $return;
        return $array;
    }
    
    /**
     * Summary of checkIBAN
     * Pr�ft ob es sich um eine IBAN Nummer handelt
     * @param $IBAN
     * @return Boolean
     */
    public function checkIBAN($IBAN = "")
	{
        $IBAN = preg_replace('/\s*/i', '', $IBAN);
        return preg_match('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/i', $IBAN);
    }

    /**
     * Summary of checkBIC
     * Pr�ft ob es sich um eine BIC Nummer handelt
     * @param $BIC
     * @return Boolean
     */
    public function checkBIC($BIC = "")
	{
        $BIC = preg_replace('/\s*/i', '', $BIC);
        return preg_match('/([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)/i', $BIC);
    }
    
}

$Test = new BaseMapper();