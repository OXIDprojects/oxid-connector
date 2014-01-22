<?php

Namespace jtl\Connector\Oxid\Classes\Customer;

Class Customer {

    private $activateCustomer;
    private $createAccountPassword;
    private $deleteAccounts;
    private $setAccountCredit;
    private $id;
    private $customerGroupId;
    private $localeName;
    private $customerNumber;
    private $password;
    private $salutation;
    private $title;
    private $firstName;
    private $lastName;
    private $company;
    private $deliveryInstruction;
    private $street;
    private $streetNumber;
    private $extraAddressLine;
    private $zipCode;
    private $city;
    private $state;
    private $countryIso;
    private $phone;
    private $mobile;
    private $fax;
    private $eMail;
    private $vatNumber;
    private $www;
    private $accountCredit;
    private $hasNewsletterSubscription;
    private $birthday;
    private $discount;
    private $origin;
    private $created;
    private $modified;
    private $isActive;
    private $isFetched;
    private $hasCustomerAccount;


    //ActivateCustomer
    public function setActivateCustomer($setactivateCustomer) {
        $this->activateCustomer = $setactivateCustomer;
    }

    public function getActivateCustomer() {
        return $this->activateCustomer;
    }

    //CreateAccountPassword
    public function setCreateAccountPassword($createAccountPassword) {
        $this->createAccountPassword = $createAccountPassword;
    }

    public function getCreateAccountPassword() {
        $this->createAccountPassword;
    }

    //DeleteAccounts
    public function setDeleteAccounts($deleteAccounts) {
        $this->deleteAccounts = $deleteAccounts;
    }

    public function getDeleteAccounts() {
        return $this->deleteAccounts;
    }

    //SetAccountCredit
    public function setSetAccountCredit($setAccountCredit) {
        $this->setAccountCredit = $setAccountCredit;
    }

    public function getSetAccountCredit() {
        return $this->setAccountCredit;
    }

    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //CustomerNumber
    public function setCustomerNumber($customerNumber) {
        $this->customerNumber = $customerNumber;
    }

    public function getCustomerNumber() {
        return $this->customerNumber;
    }

    //Password
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    //Salutation
    public function setSalutation($salutation) {
        $this->salutation = $salutation;
    }

    public function getSalutation() {
        return $this->salutation;
    }

    //Title
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
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

    //DeliveryInstruction
    public function setDeliveryInstruction($deliveryInstruction) {
        $this->deliveryInstruction = $deliveryInstruction;
    }

    public function getDeliveryInstruction() {
        return $this->deliveryInstruction;
    }

    //Company
    public function setCompany($company) {
        $this->company = $company;
    }

    public function getCompany() {
        return $this->company;
    }

    //Street
    public function setStreet($street) {
        $this->street = $street;
    }

    public function getStreet() {
        return $this->street;
    }

    //StreetNumber
    public function setStreetNumber($streetNumber) {
        $this->streetNumber = $streetNumber;
    }

    public function getStreetNumber() {
        return $this->streetNumber;
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

    //VatNumber
    public function setVatNumber($vatNumber) {
        $this->vatNumber = $vatNumber;
    }

    public function getVatNumber() {
        return $this->vatNumber;
    }

    //Www
    public function setWww($www) {
        $this->www = $www;
    }

    public function getWWW() {
        return $this->www;
    }

    //AccountCredit
    public function setAccountCredit($accountCredit) {
        $this->accountCredit = $accountCredit;
    }

    public function getAccountCredit() {
        return $this->accountCredit;
    }

    //HasNewsletterSubscription
    public function setHasNewsletterSubscription($hasNewsletterSubscription) {
        $this->hasNewsletterSubscription = $hasNewsletterSubscription;
    }

    public function getHasNewsletterSubscription() {
        return $this->hasNewsletterSubscription;
    }

    //Birthday
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    //Discount
    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function getDiscount() {
        return $this->discount;
    }

    //Origin
    public function setOrigin($origin) {
        $this->origin = $origin;
    }

    public function getOrigin() {
        return $this->origin;
    }

    //Created
    public function setCreated() {
        $this->created;
    }

    public function getCreated() {
        return $this->created;
    }

    //Modified
    public function setModified($modified) {
        $this->modified = $modified;
    }

    public function getModified() {
        return $this->modified;
    }

    //IsActive
    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    //IsFetched
    public function setIsFetched($isFetched) {
        $this->isFetched = $isFetched;
    }

    public function getIsFetched() {
        return $this->isFetched;
    }

    //HasCustomerAccount
    public function setHasCustomerAccount($hasCustomerAccount) {
        $this->hasCustomerAccount = $hasCustomerAccount;
    }

    public function getHasCustomerAccount() {
        return $this->hasCustomerAccount;
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