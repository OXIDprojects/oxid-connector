<?php

namespace jtl\Connector\Oxid\Models\Product;

class ProductFileDownload
{

    private $productId;
    private $fileDownloadId;

    //ProductId
    public function setProductId($productId)
	{
        $this->productId = $productId;
    }

    public function getProductId()
	{
        return $this->productId;
    }

    //FileDownloadId
    public function setFileDownloadId($fileDownloadId)
	{
        $this->fileDownloadId = $fileDownloadId;
    }

    public function getFileDownloadId()
	{
        return $this->fileDownloadId;
    }
}