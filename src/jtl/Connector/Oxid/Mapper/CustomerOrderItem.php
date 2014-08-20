<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CustomerOrderItem as CustomerOrderItemModel;

class CustomerOrderItem extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $customerOrderItemTable = $this->getOrderItem($data);
        
        foreach ($customerOrderItemTable as $value)
        {
            $customerOrderItemModel = new CustomerOrderItemModel();
            
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
            $customerOrderItemModel->setPrice((double)$value['OXPRICE']);
            $customerOrderItemModel->setVat((double)$value['OXVAT']);
            $customerOrderItemModel->setQuantity((double)$value['OXAMOUNT']);
            $customerOrderItemModel->setSku($value['OXARTNUM']);
            
            $return[] = $customerOrderItemModel;
        }
        return $return;
    }
    
    public function getOrderItem($param)
    {   
        $sqlResult = $this->db->query("SELECT * FROM oxorderarticles WHERE OXORDERID = '{$param['OXID']}';");
               
        return $sqlResult;
    }
}