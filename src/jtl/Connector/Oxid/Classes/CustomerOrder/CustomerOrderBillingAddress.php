<?php

Namespace jtl\Connector\Oxid\Classes\CustomerOrder;

Class CustomerOrderBillingAddress {

    private $id;
    private $customer;
    private $salutation;
    private $firstName;
    private $lastName;
    private $title;
    private $company;
    private $deliveryInstruction;
    private $street;
    private $extraAddressLine;
    private $zipCode;
    private $city;
    private $state;
    private $countryIso;
    private $phone;
    private $mobile;
    private $fax;
    private $eMail;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Customer
    public function setCustomer($customer) {
        $this->customer = $customer;
    }

    public function getCustomer() {
        $this->customer;
    }

    //Salutation
    public function setSalutation($salutation) {
        $this->salutation = $salutation;
    }

    public function getSalutation() {
        return $this->salutation;
    }

    //FirstName
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    //LastName
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    //Title
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    //Company
    public function setCompany($company) {
        $this->company = $company;
    }

    public function getCompany() {
        return $this->company;
    }

    //DeliveryInstruction
    public function setDeliveryInstruction($deliveryInstruction) {
        $this->deliveryInstruction = $deliveryInstruction;
    }

    public function getDeliveryInstruction() {
        return $this->deliveryInstruction;
    }

    //Street
    public function setStreet($street) {
        $this->street = $street;
    }

    public function getStreet() {
        return $this->street;
    }

    //ExtraAddressLine
    public function setExtraAddressLine($extraAddressLine) {
        $this->extraAddressLine = $extraAddressLine;
    }

    public function getExtraAddressLine() {
        return $this->extraAddressLine;
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

    //State
    public function setState($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
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

    //Mobile
    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function getMobile() {
        return $this->mobile;
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