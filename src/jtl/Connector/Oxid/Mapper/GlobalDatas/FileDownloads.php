<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Database,
jtl\Connector\Oxid\Models\GlobalData\FileDownload;

require_once("../../Database/Database.php");
require_once("../../Models/GlobalData/GlobalsConf.inc.php");

class FileDownloads
{

    public $FileDownload = array();
    public $FileDownloadI18n = array();

    /**
     * Ziehe FileDownload vom Oxid-Shop
     * @return type
     */
    public function getFileDownloads()
	{
        $database = new Database\Database;

        //ToDO: Select Statement für FileDownload
        $query = "SELECT * FROM oxshops";

        $SQLResult = $database->oxidStatement($query);

        return $this->fillFileDownloadclasses($SQLResult);
    }

    /**
     * Füllt die FileDownload-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \FileDownloads
     */
    function fillFileDownloadclasses($SQLResult)
	{
        $FileDownloads = new FileDownloads;

        for ($i = 0; $i < count($SQLResult); ++$i)
		{

            /* FileDownload */
            $FileDownload = new FileDownload\FileDownload;
            //$FileDownload->setId($SQLResult[$i]['']);
            //$FileDownload->setPath($SQLResult[$i]['']);
            //$FileDownload->setPreviewPath($SQLResult[$i]['']);
            //$FileDownload->setMaxDownloads($SQLResult[$i]['']);
            //$FileDownload->setMaxDays($SQLResult[$i]['']);
            //$FileDownload->setSort($SQLResult[$i]['']);
            //$FileDownload->setCreated($SQLResult[$i]['']);

            /* FileDownloadI18n */
            $FileDownloadI18n = new FileDownload\FileDownloadI18n;
            //$FileDownloadI18n->setFileDownloadId($SQLResult[$i]['']);
            //$FileDownloadI18n->setLocaleName($SQLResult[$i]['']);
            //$FileDownloadI18n->setName($SQLResult[$i]['']);
            //$FileDownloadI18n->setDescription($SQLResult[$i]['']);

            $FileDownloads->FileDownload[$i] = $FileDownload;
            $FileDownloads->FileDownloadI18n[$i] = $FileDownloadI18n;
        }

        return $FileDownloads;
    }

    /**
     * Schreibe FileDownload in Oxid-Shop
     * @return null
     */
    public function setFileDownloads()
	{
        return Null;
    }

}
