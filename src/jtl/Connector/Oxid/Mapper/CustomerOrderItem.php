<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Model\CustomerOrderItem as CustomerOrderItemModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of CustomerOrderItem
 */
class CustomerOrderItem extends BaseMapper
{
    
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $customerOrderItemModel = new CustomerOrderItemModel();  
        
        foreach ($params as $value)
        {
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $customerOrderItemModel->setId($identityModel);

            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXARTID']);
            $customerOrderItemModel->setProductId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXORDERID']);
            $customerOrderItemModel->setCustomerOrderId($identityModel);

            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXSELVARIANT']);
            $customerOrderItemModel->setConfigItemId($identityModel);
            
            $customerOrderItemModel->setName($value['OXTITLE']);
            $customerOrderItemModel->setPrice($value['OXPRICE']);
            $customerOrderItemModel->setVat($value['OXVAT']);
            $customerOrderItemModel->setQuantity($value['OXAMOUNT']);
            $customerOrderItemModel->setSku($value['OXARTNUM']);
            
            $container->add('customer_order_item', $customerOrderItemModel->getPublic(), false);
        }
    }
    
    public function getOrderItem($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * FROM oxorderarticles WHERE OXORDERID = '{$param['OXID']}';");
        
        return $sqlResult;
    }
}
        
/* non mapped properties
CustomerOrderItem:
 * - _shippingClassId
 * - _type
 * - _unique
 */