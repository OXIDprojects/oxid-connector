<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\GlobalData\ConfigGroup;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalsConf.inc.php");

class ConfigGroups
{

    public $ConfigGroup = array();
    public $ConfigGroupI18n = array();

    /**
     * Ziehe Konfigurationsgruppen vom Oxid-Shop
     * @return type
     */
    public function getConfigGroups()
	{
        $database = new Database\Database;

        //ToDO: Select Statement für Konfigurationsgruppen
        $query = "SELECT * FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillConfigGroupclasses($SQLResult);
    }

    /**
     * Füllt die Konfigurationsgruppen-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \ConfigGroups
     */
    function fillConfigGroupclasses($SQLResult)
	{
        $ConfigGroups = new ConfigGroups;

        for ($i = 0; $i < count($SQLResult); ++$i)
		{

            /* ConfigGroup */
            $ConfigGroup = new ConfigGroup\ConfigGroup;
            //$ConfigGroup->setId($SQLResult[$i]['']);
            //$ConfigGroup->setImagePath($SQLResult[$i]['']);
            //$ConfigGroup->setMinimumSelection($SQLResult[$i]['']);
            //$ConfigGroup->setMaximumSelection($SQLResult[$i]['']);
            //$ConfigGroup->setType($SQLResult[$i]['']);
            //$ConfigGroup->setSort($SQLResult[$i]['']);
            //$ConfigGroup->setComment($SQLResult[$i]['']);

            /* ConfigGroupI18n */
            $ConfigGroupI18n = new ConfigGroup\ConfigGroupI18n;
            //$ConfigGroupI18n->setConfigGroupId($SQLResult[$i]['']);
            //$ConfigGroupI18n->setLocaleName($SQLResult[$i]['']);
            //$ConfigGroupI18n->setName($SQLResult[$i]['']);
            //$ConfigGroupI18n->setDescription($SQLResult[$i]['']);

            $ConfigGroups->ConfigGroup[$i] = $ConfigGroup;
            $ConfigGroups->ConfigGroupI18n[$i] = $ConfigGroupI18n;
        }

        return $ConfigGroups;
    }

    /**
     * Schreibe Konfigurationsgruppen in Oxid-Shop
     * @return null
     */
    public function setConfigGroups()
	{
        return Null;
    }
}
