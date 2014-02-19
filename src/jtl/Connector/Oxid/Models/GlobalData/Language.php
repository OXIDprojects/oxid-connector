<?php
namespace jtl\Connector\Oxid\Models\GlobalData;

class Language
{

    private $id;
    private $nameEnglish;
    private $nameGerman;
    private $localeName;
    private $isDefault;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //NameEnglish
    public function setNameEnglish($nameEnglish)
	{
        $this->nameEnglish = $nameEnglish;
    }

    public function getNameEnglish()
	{
        return $this->nameEnglish;
    }

    //NameGerman
    public function setNameGerman($nameGerman)
	{
        $this->nameGerman = $nameGerman;
    }

    public function getNameGerman()
	{
        return $this->nameGerman;
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

    //IsDefault
    public function setIsDefault($isDefault)
	{
        $this->isDefault = $isDefault;
    }

    public function getIsDefault()
	{
        return $this->isDefault;
    }
}