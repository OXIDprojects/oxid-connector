<?php
namespace jtl\Connector\Oxid\Models\Product;

class FileUpload
{

    private $id;
    private $productId;
    private $name;
    private $description;
    private $fileType;
    private $isRequired;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //ProductId
    public function setProductId($productId)
	{
        $this->productId = $productId;
    }

    public function getProductId()
	{
        return $this->productId;
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

    //FileType
    public function setFileType($fileType)
	{
        $this->fileType = $fileType;
    }

    public function getFileType()
	{
        return $this->fileType;
    }

    //IsRequired
    public function setIsRequired($isRequired)
	{
        $this->isRequired = $isRequired;
    }

    public function getIsRequired()
	{
        return $this->isRequired;
    }
}