<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Model\CustomerOrderShippingAddress as CustomerOrderShippingAddressModel;

/**
 * Summary of CustomerOrderShippingAddress
 */
class CustomerOrderShippingAddress extends BaseMapper
{
    
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $customerOrderShippingAddressModel = new CustomerOrderShippingAddressModel();  
        
        foreach ($params as $value)
        {
            $customerOrderShippingAddressModel->_id = $value['OXID'];
            $customerOrderShippingAddressModel->_customerId = $value['OXUSERID'];
            
            if ($value['OXDELFNAME'] and
                $value['OXDELLNAME'] and
                $value['OXDELSTREET'] and
                $value['OXDELSTREETNR'] and
                $value['OXDELZIP'] and
                $value['OXDELCITY']) {
                
                $customerOrderShippingAddressModel->_salutation = $value['OXDELSAL'];
                $customerOrderShippingAddressModel->_firstName = $value['OXDELFNAME'];
                $customerOrderShippingAddressModel->_lastName = $value['OXDELLNAME'];
                $customerOrderShippingAddressModel->_company = $value['OXDELCOMPANY'];
                $customerOrderShippingAddressModel->_deliveryInstruction = $value['OXDELADDINFO'];
                $customerOrderShippingAddressModel->_street = $this->_streetDel($value);
                $customerOrderShippingAddressModel->_zipCode = $value['OXDELZIP'];
                $customerOrderShippingAddressModel->_city = $value['OXDELCITY'];
                $customerOrderShippingAddressModel->_state = $value['OXDELSTATEID'];
                $customerOrderShippingAddressModel->_countryIso = $value['OXDELCOUNTRYID'];
                $customerOrderShippingAddressModel->_phone = $value['OXDELFON'];
                $customerOrderShippingAddressModel->_fax = $value['OXDELFAX'];
                
            } else {
                
                $customerOrderShippingAddressModel->_salutation = $value['OXBILLSAL'];
                $customerOrderShippingAddressModel->_firstName = $value['OXBILLFNAME'];
                $customerOrderShippingAddressModel->_lastName = $value['OXBILLLNAME'];
                $customerOrderShippingAddressModel->_company = $value['OXBILLCOMPANY'];
                $customerOrderShippingAddressModel->_deliveryInstruction = $value['OXBILLADDINFO'];
                $customerOrderShippingAddressModel->_street = $this->_streetBill($value);
                $customerOrderShippingAddressModel->_zipCode = $value['OXBILLZIP'];
                $customerOrderShippingAddressModel->_city = $value['OXBILLCITY'];
                $customerOrderShippingAddressModel->_state = $value['OXBILLSTATEID'];
                $customerOrderShippingAddressModel->_countryIso = $value['OXBILLCOUNTRYID'];
                $customerOrderShippingAddressModel->_phone = $value['OXBILLFON'];
                $customerOrderShippingAddressModel->_fax = $value['OXBILLFAX'];
                
            }
            
            $container->add('customer_order_shipping_address', $customerOrderShippingAddressModel->getPublic(), false);
        }
    }
    
    public function getOrderShippingAddress($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * FROM oxorder WHERE OXID = '{$param['OXID']}';");
        
        return $sqlResult;
    }
    
    public function _streetDel($data) 
    {
    	return "{$data['OXDELSTREET']}  {$data['OXDELSTREETNR']}";
    }
    
    public function _streetBill($data)
    {
        return "{$data['OXBILLSTREET']}  {$data['OXBILLSTREETNR']}";
    }
    
    public function OXDELSTREET($data)
    {
        preg_match('/^[a-z ]*/i', $data['_street'], $result);
        return  $result[0];
    }
    
    public function OXDELSTREETNR($data)
    {
        preg_match('/[0-9].*/i', $data['_street'], $result);
        return  $result[0];
    }
}
/* non mapped properties
CustomerOrderShippingAddress:
_title
_extraAddressLine
_mobile
_eMail
 */