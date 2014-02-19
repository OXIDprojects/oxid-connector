<?php
namespace jtl\Connector\Oxid\Models\Image;

class Image
{

    private $id;
    private $masterImageId;
    private $relationType;
    private $foreignKey;
    private $filename;
    private $sort;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //MasterImageId
    public function setMasterImageId($masterImageId)
	{
        $this->masterImageId = $masterImageId;
    }

    public function getMasterImageId()
	{
        return $this->masterImageId;
    }

    //RelationType
    public function setRelationType($relationType)
	{
        $this->relationType = $relationType;
    }

    public function getRelationType()
	{
        return $this->relationType;
    }

    //foreignKey
    public function setforeignKey($foreignKey)
	{
        $this->foreignKey = $foreignKey;
    }

    public function getforeignKey()
	{
        return $this->foreignKey;
    }

    //Filename
    public function setFilename($filename)
	{
        $this->filename = $filename;
    }

    public function getFilename()
	{
        return $this->filename;
    }

    //Sort
    public function setSort($sort)
	{
        $this->sort = $sort;
    }

    public function getSort()
	{
        return $this->sort;
    }
}