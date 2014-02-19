<?php
namespace jtl\Connector\Oxid\Models\Product\MediaFile;

class MediaFileAttr {

    private $id;
    private $mediaFileId;
    private $localeName;
    private $key;
    private $value;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //MediaFileId
    public function setMediaFileId($mediaFileId) {
        $this->mediaFileId = $mediaFileId;
    }

    public function getMediaFileId() {
        return $this->mediaFileId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->$localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //Key
    public function setKey($key) {
        $this->key = $key;
    }

    public function getKey() {
        return $this->key;
    }

    //Value
    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}
