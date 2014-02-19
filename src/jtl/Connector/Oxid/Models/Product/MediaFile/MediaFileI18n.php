<?php
namespace jtl\Connector\Oxid\Models\Product\MediaFile;

class MediaFileI18n
{

    private $mediaFileId;
    private $localeName;
    private $name;
    private $description;


    //MediaFileId
    public function setMediaFileId($mediaFileId)
	{
        $this->mediaFileId = $mediaFileId;
    }

    public function getMediaFileId()
	{
        return $this->mediaFileId;
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