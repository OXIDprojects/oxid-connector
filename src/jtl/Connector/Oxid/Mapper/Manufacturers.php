<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\Models\Manufacturer;

require_once("../Database/Database.php");
require_once("../Models/ManufacturerConf.inc.php");

/**
 * Summary of Manufacturers
 */
class Manufacturers
{

    public $Manufacturer = array();
    public $ManufacturerI18n = array();

    /**
     * Ziehe Hersteller vom Oxid-Shop
     * @return type
     */
    public function getManufacturers()
    {
        $database = new Database\Database;

        //ToDO: Select Statement für Hersteller
        $query = "SELECT * FROM oxmanufacturers";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillManufacturerclasses($SQLResult);
    }

    /**
     * Füllt die Hersteller-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Manufacturers
     */
    function fillManufacturerclasses($SQLResult)
    {
        $Manufacturers = new Manufacturers;

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* Manufacturer */
            $Manufacturer = new Manufacturer\Manufacturer;
            $Manufacturer->setId($SQLResult[$i]['OXID']);
            $Manufacturer->setName($SQLResult[$i]['OXTITLE']);
            //$Manufacturer->setWWW($SQLResult[$i]['']); // Nicht in Oxid
            //$Manufacturer->setSort($SQLResult[$i]['']); // Nicht in Oxid
            //$Manufacturer->setUrlPath($SQLResult[$i]['']); // Nicht in Oxid

            /* ManufacturerI18n */
            for ($j = 1; $j < 3; ++$j)
            {
                $ManufacturerI18n = new Manufacturer\ManufacturerI18n;
                $ManufacturerI18n->setManufacturerId($SQLResult[$i]['OXID']);
                $ManufacturerI18n->setLocaleName($j);
                $ManufacturerI18n->setDescription($SQLResult[$i]['OXSHORTDESC_{$j}']);
                //$ManufacturerI18n->setMetaDescription($SQLResult[$i]['']); // Nicht in Oxid
                //$ManufacturerI18n->setMetaKeywords($SQLResult[$i]['']); // Nicht in Oxid
                $ManufacturerI18n->setTitleTag($SQLResult[$i]['OXTITLE_{$j}']);
            }
            $Manufacturers->Manufacturer[$i] = $Manufacturer;
            $Manufacturers->ManufacturerI18n[$i] = $ManufacturerI18n;
        }

        return $Manufacturers;
    }

    /**
     * Schreibe Hersteller in Oxid-Shop
     * @return null
     */
    public function setManufacturers()
    {
        return null;
    }
}

