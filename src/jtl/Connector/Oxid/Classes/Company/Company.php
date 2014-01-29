<?php

Namespace jtl\Connector\Oxid\Classes\Company;

Class Company {

    private $name;
    private $businessman;
    private $street;
    private $zipCode;
    private $city;
    private $countryIso;
    private $phone;
    private $fax;
    private $eMail;
    private $www;
    private $bankCode;
    private $accountNumber;
    private $bankName;
    private $accountHolder;
    private $vatNumber;
    private $taxIdNumber;
    private $iban;
    private $bic;


    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //Businessman
    public function setBusinessman($businessman) {
        $this->businessman = $businessman;
    }

    public function getBusinessman() {
        return $this->businessman;
    }

    //Street
    public function setStreet($street) {
        $this->street = $street;
    }

    public function getStreet() {
        return $this->street;
    }

    //ZipCode
    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    //City
    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    //CountryIso
    public function setCountryIso($countryIso) {
        $this->countryIso = $countryIso;
    }

    public function getCountryIso() {
        return $this->countryIso;
    }

    //Phone
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }

    //Fax
    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function getFax() {
        return $this->fax;
    }

    //EMail
    public function setEMail($eMail) {
        $this->eMail = $eMail;
    }

    public function getEMail() {
        return $this->eMail;
    }

    //WWW
    public function setWWW($www) {
        $this->www = $www;
    }

    public function getWWW() {
        return $this->www;
    }

    //BankCode
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }

    public function getBankCode() {
        return $this->bankCode;
    }

    //AccountNumber
    public function setAccountNumber($accountNumber) {
        $this->accountNumber = $accountNumber;
    }

    public function getAccountNumber() {
        return $this->accountNumber;
    }

    //BankName
    public function setBankName($bankName) {
        $this->bankName = $bankName;
    }

    public function getBankName() {
        return $this->bankName;
    }

    //AccountHolder
    public function setAccountHolder($accountHolder) {
        $this->accountHolder = $accountHolder;
    }

    public function getAccountHolder() {
        return $this->accountHolder;
    }

    //VatNumber
    public function setVatNumber($vatNumber) {
        $this->vatNumber = $vatNumber;
    }

    public function getVatNumber() {
        return $this->vatNumber;
    }

    //TaxIdNumber
    public function setTaxIdNumber($taxIdNumber) {
        $this->taxIdNumber = $taxIdNumber;
    }

    public function getTaxIdNumber() {
        return $this->taxIdNumber;
    }

    //Iban
    public function setIban($iban) {
        $this->iban = $iban;
    }

    public function getIban() {
        return $this->iban;
    }

    //Bic
    public function setBic($bic) {
        $this->bic = $bic;
    }

    public function getBic() {
        return $this->bic;
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
