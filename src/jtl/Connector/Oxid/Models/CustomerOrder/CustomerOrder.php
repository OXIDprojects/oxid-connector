<?php

namespace jtl\Connector\Oxid\Models\CustomerOrder;

class CustomerOrder {

    private $id;
    private $customerId;
    private $shippingAddressId;
    private $billingAddressId;
    private $shippingMethodId;
    private $localeName;
    private $currencyIso;
    private $estimatedDeliveryDate;
    private $credit;
    private $totalSum;
    private $session;
    private $shippingMethodName;
    private $orderNumber;
    private $shippingInfo;
    private $shippingDate;
    private $paymentDate;
    private $ratingNotificationDate;
    private $tracking;
    private $note;
    private $logistic;
    private $trackingURL;
    private $ip;
    private $isFetched;
    private $status;
    private $created;
    private $paymentModuleId;
    
    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerId
    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
    }

    public function getCustomerId() {
        $this->customerId;
    }

    //ShippingAddressId
    public function setShippingAddressId($shippingAddressId) {
        $this->shippingAddressId = $shippingAddressId;
    }

    public function getShippingAddressId() {
        return $this->shippingAddressId;
    }

    //BillingAddressId
    public function setBillingAddressId($billingAddressId) {
        $this->billingAddressId = $billingAddressId;
    }

    public function getBillingAddressId() {
        return $this->billingAddressId;
    }

    //ShippingMethodId
    public function setShippingMethodId($shippingMethodId) {
        $this->shippingMethodId = $shippingMethodId;
    }

    public function getShippingMethodId() {
        return $this->shippingMethodId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //CurrencyIso
    public function setCurrencyIso($currencyIso) {
        $this->currencyIso = $currencyIso;
    }

    public function getCurrencyIso() {
        return $this->currencyIso;
    }
    
    //EstimatedDeliveryDate
    public function setEstimatedDeliveryDate($estimatedDeliveryDate) {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

    public function getEstimatedDeliveryDate() {
        return $this->estimatedDeliveryDate;
    }

    //Credit
    public function setCredit($credit) {
        $this->credit = $credit;
    }

    public function getCredit() {
        return $this->credit;
    }

    //TotalSum
    public function setTotalSum($totalSum) {
        $this->totalSum = $totalSum;
    }

    public function getTotalSum() {
        return $this->totalSum;
    }

    //Session
    public function setSession($session) {
        $this->session = $session;
    }

    public function getSession() {
        return $this->session;
    }

    //ShippingMethodName
    public function setShippingMethodName($shippingMethodName) {
        $this->shippingMethodName = $shippingMethodName;
    }

    public function getShippingMethodName() {
        return $this->shippingMethodName;
    }

    //OrderNumber
    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
    }

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    //ShippingInfo
    public function setShippingInfo($shippingInfo) {
        $this->shippingInfo = $shippingInfo;
    }

    public function getShippingInfo() {
        return $this->shippingInfo;
    }

    //ShippingDate
    public function setShippingDate($shippingDate) {
        $this->shippingDate = $shippingDate;
    }

    public function getShippingDate() {
        return $this->shippingDate;
    }

    //PaymentDate
    public function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }

    //RatingNotificationDate
    public function setRatingNotificationDate($ratingNotificationDate) {
        $this->ratingNotificationDate = $ratingNotificationDate;
    }

    public function getRatingNotificationDate() {
        return $this->ratingNotificationDate;
    }

    //Tracking
    public function setTracking($tracking) {
        $this->tracking = $tracking;
    }

    public function getTracking() {
        return $this->tracking;
    }

    //Note
    public function setNote($note) {
        $this->note = $note;
    }

    public function getNote() {
        return $this->note;
    }

    //Logistic
    public function setLogistic($logistic) {
        $this->logistic = $logistic;
    }

    public function getLogistic() {
        return $this->logistic;
    }

    //TrackingURL
    public function setTrackingURL($trackingURL) {
        $this->trackingURL = $trackingURL;
    }

    public function getTrackingURL() {
        return $this->trackingURL;
    }

    //Ip
    public function setIp($ip) {
        $this->ip = $ip;
    }

    public function getIp() {
        return $this->ip;
    }

    //IsFetched
    public function setIsFetched($isFetched) {
        $this->isFetched = $isFetched;
    }

    public function getIsFetched() {
        return $this->isFetched;
    }

    //Status
    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    //Created
    public function setCreated($created) {
        $this->created = $created;
    }

    public function getCreated() {
        return $this->created;
    }

    //PaymentModuleId
    public function setPaymentModuleId($paymentModuleId) {
        $this->paymentModuleId = $paymentModuleId;
    }

    public function getPaymentModuleId() {
        return $this->paymentModuleId;
    }   
}

