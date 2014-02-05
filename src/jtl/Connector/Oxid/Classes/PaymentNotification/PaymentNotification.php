<?php
Namespace jtl\Connector\Oxid\Classes\PaymentNotification;

class PaymentNotification {
    
    private $id;
    private $customerOrderId;
    private $platformId;
    private $paymentId;
    private $paymentProviderName;
	private $amountGross;
    private $paymentFeeGross;
    private $currencyIso;
    private $paymentRecipient;
    private $paymentSender;
	private $paymentDate;
    private $note;

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

    //PlatformId
    public function setPlatformId($platformId) {
        $this->platformId = $platformId;
    }

    public function getPlatformId() {
        return $this->platformId;
    }

    //PaymentId
    public function setPaymentId($paymentId) {
        $this->paymentId = $paymentId;
    }

    public function getPaymentId() {
        return $this->paymentId;
    }

    //PaymentProviderName
    public function setPaymentProviderName($paymentProviderName) {
        $this->paymentProviderName = $paymentProviderName;
    }

    public function getPaymentProviderName() {
        return $this->paymentProviderName;
    }

    //AmountGross
    public function setAmountGross($amountGross) {
        $this->amountGross = $amountGross;
    }

    public function getAmountGross() {
        return $this->amountGross;
    }
	
	//PaymentFeeGross
    public function setPaymentFeeGross($paymentFeeGross) {
        $this->paymentFeeGross = $paymentFeeGross;
    }

    public function getPaymentFeeGross() {
        return $this->paymentFeeGross;
    }
	
	//CurrencyIso 
    public function setCurrencyIso ($currencyIso ) {
        $this->currencyIso  = $currencyIso ;
    }

    public function getCurrencyIso () {
        return $this->currencyIso ;
    }
	
	//PaymentRecipient
    public function setPaymentRecipient($paymentRecipient) {
        $this->paymentRecipient = $paymentRecipient;
    }

    public function getPaymentRecipient() {
        return $this->paymentRecipient;
    }
	
    //PaymentSender
    public function setPaymentSender($paymentSender) {
        $this->paymentSender = $paymentSender;
    }

    public function getPaymentSender() {
        return $this->paymentSender;
    }
	
	//PaymentDate
    public function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }
    
	//Note
    public function setNote($note) {
        $this->note = $note;
    }

    public function getNote() {
        return $this->note;
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