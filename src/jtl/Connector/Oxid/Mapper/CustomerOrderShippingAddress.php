<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Model\CustomerOrderShippingAddress as CustomerOrderShippingAddressModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of CustomerOrderShippingAddress
 */
class CustomerOrderShippingAddress extends BaseMapper
{
    
    public function pull($data=null, $offset=0, $limit=null)
    {
        $customerOrderShippingAddressModel = new CustomerOrderShippingAddressModel();  
        
        foreach ($params as $value)
        {
            $customerOrderShippingAddressModel = new CustomerOrderShippingAddressModel();  
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $customerOrderShippingAddressModel->setId($identityModel);

            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXUSERID']);
            $customerOrderShippingAddressModel->setCustomerId($identityModel);
            
            if ($value['OXDELFNAME'] and
                $value['OXDELLNAME'] and
                $value['OXDELSTREET'] and
                $value['OXDELSTREETNR'] and
                $value['OXDELZIP'] and
                $value['OXDELCITY']) {
                
                $customerOrderShippingAddressModel->setSalutation($value['OXDELSAL']);
                $customerOrderShippingAddressModel->setFirstName($value['OXDELFNAME']);
                $customerOrderShippingAddressModel->setLastName($value['OXDELLNAME']);
                $customerOrderShippingAddressModel->setCompany($value['OXDELCOMPANY']);
                $customerOrderShippingAddressModel->setDeliveryInstruction($value['OXDELADDINFO']);
                $customerOrderShippingAddressModel->setStreet($this->_streetDel($value));
                $customerOrderShippingAddressModel->setZipCode($value['OXDELZIP']);
                $customerOrderShippingAddressModel->setCity($value['OXDELCITY']);
                $customerOrderShippingAddressModel->setState($value['OXDELSTATEID']);
                $customerOrderShippingAddressModel->setCountryIso($value['OXDELCOUNTRYID']);
                $customerOrderShippingAddressModel->setPhone($value['OXDELFON']);
                $customerOrderShippingAddressModel->setFax($value['OXDELFAX']);
                
            } else {
                
                $customerOrderShippingAddressModel->setSalutation($value['OXBILLSAL']);
                $customerOrderShippingAddressModel->setFirstName($value['OXBILLFNAME']);
                $customerOrderShippingAddressModel->setLastName($value['OXBILLLNAME']);
                $customerOrderShippingAddressModel->setCompany($value['OXBILLCOMPANY']);
                $customerOrderShippingAddressModel->setDeliveryInstruction($value['OXBILLADDINFO']);
                $customerOrderShippingAddressModel->setStreet($this->_streetBill($value));
                $customerOrderShippingAddressModel->setZipCode($value['OXBILLZIP']);
                $customerOrderShippingAddressModel->setCity($value['OXBILLCITY']);
                $customerOrderShippingAddressModel->setState($value['OXBILLSTATEID']);
                $customerOrderShippingAddressModel->setCountryIso($value['OXBILLCOUNTRYID']);
                $customerOrderShippingAddressModel->setPhone($value['OXBILLFON']);
                $customerOrderShippingAddressModel->setFax($value['OXBILLFAX']);
                
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