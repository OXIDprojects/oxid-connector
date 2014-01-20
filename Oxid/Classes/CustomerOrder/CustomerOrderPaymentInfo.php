<?php

Class CustomerOrderPaymentInfo {

    private $id;
    private $customerOrderId;
    private $bankAccount;
    private $bankCode;
    private $accountHolder;
    private $accountNumber;
    private $iban;
    private $bic;
    private $creditCardNumber;
    private $creditCardVerificationNumber;
    private $creditCardExpiration;
    private $creditCardType;
    private $creditCardHolder;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerOrderId
    public function setCustomerOrderId($customerOrderId) {
        $this->customerOrderId = $customerOrderId;
    }

    public function getCustomerOrderId() {
        return $this->customerOrderId;
    }

    //BankAccount
    public function setBankAccount($bankAccount) {
        $this->bankAccount = $bankAccount;
    }

    public function getBankAccount() {
        return $this->bankAccount;
    }

    //BankCode
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }

    public function getBankCode() {
        return $this->bankCode;
    }

    //AccountHolder
    public function setAccountHolder($accountHolder) {
        $this->accountHolder = $accountHolder;
    }

    public function getAccountHolder() {
        return $this->accountHolder;
    }

    //AccountNumber
    public function setAccountNumber($accountNumber) {
        $this->accountNumber = $accountNumber;
    }

    public function getAccountNumber() {
        return $this->accountNumber;
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

    //CreditCardNumber
    public function setCreditCardNumber($creditCardNumber) {
        $this->creditCardNumber = $creditCardNumber;
    }

    public function getCreditCardNumber() {
        return $this->creditCardNumber;
    }

    //CreditCardVerificationNumber
    public function setCreditCardVerificationNumber($creditCardVerificationNumber) {
        $this->creditCardVerificationNumber = $creditCardVerificationNumber;
    }

    public function getCreditCardVerificationNumber() {
        return $this->creditCardVerificationNumber;
    }

    //CreditCardExpiration
    public function setCreditCardExpiration($creditCardExpiration) {
        $this->creditCardExpiration = $creditCardExpiration;
    }

    public function getCreditCardExpiration() {
        return $this->creditCardExpiration;
    }

    //CreditCardType
    public function setCreditCardType($creditCardType) {
        $this->creditCardType = $creditCardType;
    }

    public function getCreditCardType() {
        return $this->creditCardType;
    }

    //CreditCardHolder
    public function setCreditCardHolder($creditCardHolder) {
        $this->creditCardHolder = $creditCardHolder;
    }

    public function getCreditCardHolder() {
        return $this->creditCardHolder;
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