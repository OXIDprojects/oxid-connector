<?php

Namespace jtl\Connector\Oxid\Classes\Product;

class ProductI18n {

    private $localeName;
    private $productId;
    private $name;
    private $url;
    private $description;
    private $shortDescription;
    private $titleTag;
    private $metaDescription;
    private $metaKeywords;


    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //Url
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    //Description
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    //ShortDescription
    public function setShortDescription($shortDescription) {
        $this->shortDescription = $shortDescription;
    }

    public function getShortDescription() {
        return $this->shortDescription;
    }

    //TitleTag
    public function setTitleTag($titleTag) {
        $this->titleTag = $titleTag;
    }

    public function getTitleTag() {
        return $this->titleTag;
    }

    //MetaDescription
    public function setMetaDescription($metaDescription) {
        $this->metaDescription = $metaDescription;
    }

    public function getMetaDescription() {
        return $this->metaDescription;
    }

    //MetaKeywords
    public function setMetaKeywords($metaKeywords) {
        $this->metaKeywords = $metaKeywords;
    }

    public function getMetaKeywords() {
        return $this->metaKeywords;
    }


    
    
    //Undefinierte Methoden aufrufe abfangen
    public function __call($name, $arguments) {
        If (!empty($arguments)) {
            $ausgabe = "Die Methode: " . $name .
                    " mit dem Parameter: " . $arguments .
                    " existiert nicht.";
        } Else {
            $ausgabe = "Die Methode: " . $name .
                    " existiert nicht.";
        }
        echo $ausgabe;
    }

    //Undefinierte Eigenschaft aufrufe abfangen
    public function __get($name) {
        echo "Die Eigenschaft: " . $name . " existiert nicht.";
    }
    
    //Undefinierte Eigenschaft setzten abfangen
    public function __set($name, $wert) {
        echo "Die Eigenschaft: " . $name . " Existiert nicht. Der Wert: " . $wert . "konnte nicht zugeordnet werden.";
    }


}

?>
