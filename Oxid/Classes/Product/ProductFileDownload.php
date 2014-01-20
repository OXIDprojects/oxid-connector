<?php

Class ProductFileDownload {

    private $productId;
    private $fileDownloadId;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //FileDownloadId
    public function setFileDownloadId($fileDownloadId) {
        $this->fileDownloadId = $fileDownloadId;
    }

    public function getFileDownloadId() {
        return $this->fileDownloadId;
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Abfang Funktionen">
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

    // </editor-fold>
}

?>
