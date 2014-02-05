<?php
Namespace jtl\Connector\Oxid\Classes\Product\FileDownload;

Class FileDownload {
   
    private $id;
    private $path;
    private $previewPath;
	private $maxDownloads;
	private $maxDays;
    private $sort;
	private $created;
	
	//Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Path
    public function setPath($path) {
        $this->path = $path;
    }
    
    public function getPath() {
        return $this->path;
    }

    //PreviewPath
    public function setPreviewPath($previewPath) {
        $this->previewPath = $previewPath;
    }
    
    public function getPreviewPath() {
        return $this->previewPath;
    }
	
	//MaxDownloads
    public function setMaxDownloads($maxDownloads) {
        $this->maxDownloads = $maxDownloads;
    }
    
    public function getMaxDownloads() {
        return $this->maxDownloads;
    }
	
	//MaxDays
    public function setMaxDays($maxDays) {
        $this->maxDays = $maxDays;
    }
    
    public function getMaxDays() {
        return $this->maxDays;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }
    
    public function getSort() {
        return $this->sort;
    }
	
	//Created
    public function setCreated($created) {
        $this->created = $created;
    }
    
    public function getCreated() {
        return $this->created;
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