<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CustomerOrderItem as CustomerOrderItemModel;
use jtl\Connector\Model\CustomerOrderItemVariation as CustomerOrderItemVariationModel;
use jtl\Connector\Oxid\Mapper\CustomerOrderItemVariation as CustomerOrderItemVariationMapper;

class CustomerOrderItem extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $customerOrderItemTable = $this->getOrderItem($data);
        
        foreach ($customerOrderItemTable as $value)
        {
                $customerOrderItemModel = new CustomerOrderItemModel();
                $customerOrderItemVariationModel = new CustomerOrderItemVariationModel();
                $customerOrderItemVariationMapper = new CustomerOrderItemVariationMapper();
            
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
                
                if (!empty($value['OXSELVARIANT'])) {
                    $customerOrderItemVariationModel = $customerOrderItemVariationMapper->pull($value['OXORDERID'], $value, 0, null);
                    
                    foreach ($customerOrderItemVariationModel as $variationModel)
                    {
                        $customerOrderItemModel->addVariation($variationModel);
                    }
                }
            
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
        $sqlResult = $this->db->query(" SELECT * FROM oxorderarticles " .
                                      " WHERE oxorderarticles.OXORDERID = '{$param['OXID']}' ");
        return $sqlResult;
    }
}