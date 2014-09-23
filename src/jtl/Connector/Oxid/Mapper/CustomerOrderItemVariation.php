<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CustomerOrderItemVariation as CustomerOrderItemVariationModel;
use jtl\Connector\Oxid\Mapper\CustomerOrderItem as ProductVariationValueMapper;

class CustomerOrderItemVariation extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $customerOrderItemTable = $this->getOrderItem($data);
        
        foreach ($customerOrderItemTable as $value)
        {
            if (empty($value['OXPARENTID'])) {
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
                
                addVariation
                
                $productVariationI18nModel = $productVariationI18nMapper->pull($oxId, $i, $productVariationTable, 0, null);
                        
                foreach ($productVariationI18nModel as $I18nModel)
                {
                    $productVariationModel->addi18n($I18nModel);
                }
            
                $customerOrderItemModel->setName($value['OXTITLE']);
                $customerOrderItemModel->setPrice((double)$value['OXPRICE']);
                $customerOrderItemModel->setVat((double)$value['OXVAT']);
                $customerOrderItemModel->setQuantity((double)$value['OXAMOUNT']);
                $customerOrderItemModel->setSku($value['OXARTNUM']);
            
                $return[] = $customerOrderItemModel;
            }
        }
        
        return $return;
    }
    
    public function getOrderItem($param)
    {   
        $sqlResult = $this->db->query(" SELECT oxorderarticles.*, oxarticles.OXPARENTID FROM oxorderarticles, oxarticles " .
                                      " WHERE oxorderarticles.OXARTID = oxarticles.OXID " .
                                      " AND oxorderarticles.OXORDERID = '{$param['OXID']}' ");
        return $sqlResult;
    }
}