<?php
namespace jtl\Connector\Oxid\Models\GlobalData\FileDownload;

class FileDownload
{

    private $id;
    private $path;
    private $previewPath;
	private $maxDownloads;
	private $maxDays;
    private $sort;
	private $created;

	//Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //Path
    public function setPath($path)
	{
        $this->path = $path;
    }

    public function getPath()
	{
        return $this->path;
    }

    //PreviewPath
    public function setPreviewPath($previewPath)
	{
        $this->previewPath = $previewPath;
    }

    public function getPreviewPath()
	{
        return $this->previewPath;
    }

	//MaxDownloads
    public function setMaxDownloads($maxDownloads)
	{
        $this->maxDownloads = $maxDownloads;
    }

    public function getMaxDownloads()
	{
        return $this->maxDownloads;
    }

	//MaxDays
    public function setMaxDays($maxDays)
	{
        $this->maxDays = $maxDays;
    }

    public function getMaxDays()
	{
        return $this->maxDays;
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

	//Created
    public function setCreated($created)
	{
        $this->created = $created;
    }

    public function getCreated()
	{
        return $this->created;
    }
}