<?php

namespace jtl\Connector\Oxid\Utilities;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Config\Loader As ConfigLoader;

/**
 * Summary of OxConfunctions
 * Zusätzliche Funktionen zum OXID-Connector
 */
class OxConfunctions
{
    
    /**
     * Summary of checkIBAN
     * Prüft ob es sich um eine IBAN Nummer handelt
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
     * Prüft ob es sich um eine BIC Nummer handelt
     * @param $BIC
     * @return Boolean
     */
    public function checkBIC($BIC = "")
	{
        $BIC = preg_replace('/\s*/i', '', $BIC);
        return preg_match('/([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)/i', $BIC);
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
        
        //Nach Migration "aLanguageParams" aus Array schmeißen
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
    
}