<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Model\CustomerOrderItem as CustomerOrderItemModel;

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
            $customerOrderItemModel->_id = $value['OXID'];
            $customerOrderItemModel->_productId = $value['OXARTID'];
            $customerOrderItemModel->_customerOrderId = $value['OXORDERID'];
            $customerOrderItemModel->_name = $value['OXTITLE'];
            $customerOrderItemModel->_price = $value['OXPRICE'];
            $customerOrderItemModel->_vat = $value['OXVAT'];
            $customerOrderItemModel->_quantity = $value['OXAMOUNT'];
            $customerOrderItemModel->_configItemId = $value['OXSELVARIANT'];
            $customerOrderItemModel->_sku = $value['OXARTNUM'];
            
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