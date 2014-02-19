<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\Models\Image;

require_once("../Database/Database.php");
require_once("../Models/Image/ImageConf.inc.php");

/**
 * Summary of Images
 */
class Images
{

    public $Image = array();

    /**
     * Ziehe Bilder vom Oxid-Shop
     * @return type
     */
    public function getImages()
    {
        $database = new Database\Database;

        $query = "SELECT * FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillImageclasses($SQLResult);
    }

    /**
     * Füllt die Bild-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Images
     */
    function fillImageclasses($SQLResult)
    {
        $Images = new Images;

        for ($i = 0; $i < count($SQLResult); ++$i)
        {

            /* DeliveryNote */
            $Image = new Image\Image;
            $Image->setId($SQLResult[$i]['']);
            $Image->setMasterImageId($SQLResult[$i]['']);
            $Image->setRelationType($SQLResult[$i]['']);
            $Image->setforeignKey($SQLResult[$i]['']);
            $Image->setFilename($SQLResult[$i]['']);
            $Image->setSort($SQLResult[$i]['']);

            $Images->Image[$i] = $Image;
        }

        return $Images;
    }

    /**
     * Schreibe Bilder in Oxid-Shop
     * @return null
     */
    public function setImages()
    {
        return null;
    }

}
