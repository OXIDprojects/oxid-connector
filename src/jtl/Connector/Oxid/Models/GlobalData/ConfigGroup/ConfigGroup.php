<?php
namespace jtl\Connector\Oxid\Models\GlobalData\ConfigGroup;

class ConfigGroup
{

	private $id;
	private $imagePath;
    private $minimumSelection;
    private $maximumSelection;
	private $type;
    private $sort;
    private $comment;

	//Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //ImagePath
    public function setImagePath($imagePath)
	{
        $this->imagePath = $imagePath;
    }

    public function getImagePath()
	{
        return $this->imagePath;
    }

	//MinimumSelection
    public function setMinimumSelection($minimumSelection)
	{
        $this->minimumSelection = $minimumSelection;
    }

    public function getMinimumSelection()
	{
        return $this->minimumSelection;
    }

    //MaximumSelection
    public function setMaximumSelection($maximumSelection)
	{
        $this->maximumSelection = $maximumSelection;
    }

    public function getMaximumSelection()
	{
        return $this->maximumSelection;
    }

	//Type
    public function setType($type)
	{
        $this->type = $type;
    }

    public function getType()
	{
        return $this->type;
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

	//Comment
    public function setComment($comment)
	{
        $this->comment = $comment;
    }

    public function getComment()
	{
        return $this->comment;
    }
}