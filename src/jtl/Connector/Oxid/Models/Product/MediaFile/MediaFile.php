<?php
namespace jtl\Connector\Oxid\Models\Product\MediaFile;

class MediaFile {

    private $id;
    private $productId;
    private $path;
    private $url;
    private $mediaFileCategory;
    private $type;
    private $sort;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //Path
    public function setPath($path) {
        $this->path = $path;
    }

    public function getPath() {
        return $this->path;
    }

    //Url
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    //MediaFileCategory
    public function setMediaFileCategory($mediaFileCategory) {
        $this->mediaFileCategory = $mediaFileCategory;
    }

    public function getMediaFileCategory() {
        return $this->mediaFileCategory;
    }

    //Type
    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSort() {
        return $this->sort;
    }
}


