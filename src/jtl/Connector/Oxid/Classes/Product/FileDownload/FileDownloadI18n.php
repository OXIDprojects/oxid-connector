<?php
Namespace jtl\Connector\Oxid\Classes\Product\FileDownload;

Class FileDownloadI18n {
    
    private $fileDownloadId;
    private $localeName;
    private $name;
	private $description;
	
	//FileDownloadId
    public function setFileDownloadId($fileDownloadId) {
        $this->fileDownloadId = $fileDownloadId;
    }

    public function getFileDownloadId() {
        return $this->fileDownloadId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }
    
    public function getLocaleName() {
        return $this->localeName;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
	
	//Description
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
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