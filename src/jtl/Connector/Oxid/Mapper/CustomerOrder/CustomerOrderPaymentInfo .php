<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CustomerOrderContainer;
//use jtl\Connector\Model\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoModel;

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
            $customerOrderPaymentInfo->_id = $value['id'];
            $customerOrderPaymentInfo->_customerOrderId = $value['name'];
            $customerOrderPaymentInfo->_bankName = $value['symbol'];
            $customerOrderPaymentInfo->_bankCode = $value['rate'];
            $customerOrderPaymentInfo->_accountHolder = $value['decimal_separator'];
            $customerOrderPaymentInfo->_accountNumber = $value['thousand_separator'];
            $customerOrderPaymentInfo->_iban = $value[''];
            $customerOrderPaymentIngo->_bic = $value[''];
            
            $container->add('customer_order_payment_info', $currency->getPublic(array('_fields')));
        }
    }
    
    public function getPaymentInfo()
    {
        $OxidConf = new Config();
        
        $SQLResult = $this->_db->query("SELECT *, " .
                                        " DECODE(OXVALUE, 'sd45DF09_sdlk09239DD') AS OXVALUEDECODED " .
                                        " FROM oxuserpayments");
        
        echo "<pre>";
        die(print_r($SQLResult));
        
        $currencyArr = unserialize($SQLResult[0]['OXVALUEDECODED']);   
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