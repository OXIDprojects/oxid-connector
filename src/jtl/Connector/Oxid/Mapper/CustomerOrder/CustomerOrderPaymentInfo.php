<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Model\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoModel;

/**
 * Summary of CustomerOrderPaymentInfo 
 */
class CustomerOrderPaymentInfo  extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $customerOrderPaymentInfo = new CustomerOrderPaymentInfoModel();
        
        foreach ($params as $value)
        {
            $customerOrderPaymentInfo->_id = $value['OXID'];
            $customerOrderPaymentInfo->_customerOrderId = $value['OXUSERID'];
            
            if(isset($value['lsbankname']))
            {
                $customerOrderPaymentInfo->_bankName = $value['lsbankname'];
            }
            
            if(isset($value['lsktoinhaber']))
            {
                $customerOrderPaymentInfo->_accountHolder = $value['lsktoinhaber'];
            }
            
            if(isset($value['lsktonr']))
            {
                if($this->checkIBAN($value['lsktonr']))
                {
                    $customerOrderPaymentInfo->_iban = $value['lsktonr'];                
                    $customerOrderPaymentInfo->_accountNumber = "";
                } else {
                    $customerOrderPaymentInfo->_accountNumber = $value['lsktonr'];
                }
            }
            
            if(isset($value['lsblz']))
            {
                if($this->checkBIC($value['lsblz']))
                {
                    $customerOrderPaymentIngo->_bic = $value['lsblz'];    
                    $customerOrderPaymentInfo->_bankCode = "";
                } else {
                    $customerOrderPaymentInfo->_bankCode = $value['lsblz'];
                }
            }
            
            $container->add('customer_order_payment_info', $customerOrderPaymentInfo->getPublic(array('_fields')));
        }
    }
    
    public function getPaymentInfo()
    {   
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT OXID, OXUSERID,  " .
                                        " DECODE(OXVALUE, 'sd45DF09_sdlk09239DD') AS OXVALUEDECODED " .
                                        " FROM oxuserpayments");        
        
        //Hole alle PaymentInfos pro Bestellung
        for ($i = 0; $i < count($sqlResult); $i++)
        {          
            if($sqlResult[$i]['OXVALUEDECODED'])
            {
                $paymentInfoArr = explode("@@", $sqlResult[$i]['OXVALUEDECODED']);
                unset($paymentInfoArr[4]);
                
                //Vergebe neue Key Parameter
                foreach ($paymentInfoArr as $k => $v) 
                {
                    unset ($paymentInfoArr[$k]);

                    switch ($k)
                    {
                        case 0:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                        case 1:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                        case 2:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                        case 3:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                    }
                    $paymentInfoArr[$new_key] = $v;
                }
                
                //Füge Array PaymentInformationen hinzu
                $sqlResult[$i] = $sqlResult[$i] + $paymentInfoArr;
                
            }
            //Entferne Spalte OxValueDecoded
            unset($sqlResult[$i]['OXVALUEDECODED']);
        }      
        return $sqlResult;
    }
    
    /**
     * Summary of checkIBAN
     * Prüft ob es sich um eine IBAN Nummer handelt
     * @param $iban
     * @return Boolean
     */
    public function checkIBAN($iban = "")
	{
        $iban = preg_replace('/\s*/i', '', $iban);
        return preg_match('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/i', $iban);
    }

    /**
     * Summary of checkBIC
     * Prüft ob es sich um eine BIC Nummer handelt
     * @param $bic
     * @return Boolean
     */
    public function checkBIC($bic = "")
	{
        $bic = preg_replace('/\s*/i', '', $bic);
        return preg_match('/([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)/i', $bic);
    }
}
/* non mapped properties
CustomerOrderPaymentInfo :
_creditCardNumber
_creditCardVerificationNumber
_creditCardExpiration
_creditCardType
_creditCardHolder
 */