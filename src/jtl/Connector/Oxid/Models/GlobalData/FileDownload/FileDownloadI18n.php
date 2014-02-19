<?php
namespace jtl\Connector\Oxid\Models\GlobalData\FileDownload;

class FileDownloadI18n
{

    private $fileDownloadId;
    private $localeName;
    private $name;
	private $description;

	//FileDownloadId
    public function setFileDownloadId($fileDownloadId)
	{
        $this->fileDownloadId = $fileDownloadId;
    }

    public function getFileDownloadId()
	{
        return $this->fileDownloadId;
    }

    //LocaleName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
    }

    //Name
    public function setName($name)
	{
        $this->name = $name;
    }

    public function getName()
	{
        return $this->name;
    }

	//Description
    public function setDescription($description)
	{
        $this->description = $description;
    }

    public function getDescription()
	{
        return $this->description;
    }
}