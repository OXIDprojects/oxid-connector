<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CustomerOrderItemVariation as CustomerOrderItemVariationModel;
use jtl\Connector\Oxid\Mapper\CustomerOrderItem as ProductVariationValueMapper;

class CustomerOrderItemVariation extends BaseMapper
{
    public function pull($orderID=null, $data=null, $offset=0, $limit=null)
    {
        $return = [];
        
        $ItemVariationTable = $this->getOrderItemVariation($data);
        $ItemVariationValues = $this->getProdVarArray($ItemVariationTable);
        $ItemVariationId = $ItemVariationTable[0]['OXID'];
        
        for ($i = 0; $i < count($ItemVariationValues); $i++)
        {
            $newItemVariationValues[] = array(
              array_keys($ItemVariationValues)[$i]  => $ItemVariationValues[array_keys($ItemVariationValues)[$i]][0],
            );
        }
                
        foreach ($newItemVariationValues as $value)
        {       
            $customerOrderItemVariationModel = new CustomerOrderItemVariationModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($orderID);
            $customerOrderItemVariationModel->setCustomerOrderItemId($identityModel);
                
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($ItemVariationId);
            $customerOrderItemVariationModel->setId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($ItemVariationId . '_' . array_keys($value)[0]);
            $customerOrderItemVariationModel->setProductVariationId($identityModel);

            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($ItemVariationId . '_' . $value[array_keys($value)[0]]);
            $customerOrderItemVariationModel->setProductVariationValueId($identityModel);
            
            $customerOrderItemVariationModel->setProductVariationName(array_keys($value)[0]);
            $customerOrderItemVariationModel->setProductVariationValueName($value[array_keys($value)[0]]);
            
            $return[] = $customerOrderItemVariationModel;
        }
        
        return $return;
    }
    
    public function getOrderItemVariation($param)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxarticles " .
                                      " WHERE OXID = '{$param['OXARTID']}' " . 
                                      " OR OXID = (SELECT OXPARENTID FROM oxarticles " .
			                          "             WHERE OXID = '{$param['OXARTID']}') " .
                                      " ORDER BY OXPARENTID DESC ");
        return $sqlResult;
    }
}