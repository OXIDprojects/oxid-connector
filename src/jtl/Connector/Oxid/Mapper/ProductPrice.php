<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductPrice as ProductPriceModel;

class ProductPrice extends BaseMapper
{
    
    public function pull($data=null, $offset=0, $limit=null)
    {   
        $return = [];
        $productPriceTable = $this->getProductPrice($data);
               
        for ($i = 0; $i <= 3; $i++)       
        {   
            $productPriceModel = new ProductPriceModel();
            
            $customerGroupId = '';
            
            switch($i)
            {  
                case (0):
                    $customerGroupId = $this->getDefaultCustomerGroupId();
                    
                    $productPriceModel->setNetPrice($this->getNetPrice($productPriceTable[0]['OXPRICE']));
                    break;
                case (1):                  
                    if ($productPriceTable[0]['OXPRICEA'] != '0') {
                        $customerGroupId = 'oxidpricea';
                        
                        $productPriceModel->setNetPrice($this->getNetPrice($productPriceTable[0]['OXPRICEA']));
                    }
                    break;
                case (2):                    
                    if ($productPriceTable[0]['OXPRICEB'] != '0') {
                        $customerGroupId = 'oxidpriceb';
                        
                        $productPriceModel->setNetPrice($this->getNetPrice($productPriceTable[0]['OXPRICEB']));
                    }
                    break;
                case (3):
                    if ($productPriceTable[0]['OXPRICEC'] != '0') {
                        $customerGroupId = 'oxidpricec';
                        
                        $productPriceModel->setNetPrice($this->getNetPrice($productPriceTable[0]['OXPRICEC']));
                    }
                    break;
            }
            
            $identityModel = new IdentityModel();                       
            $identityModel->setEndpoint($customerGroupId);
            $productPriceModel->setCustomerGroupId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($productPriceTable[0]['OXID']);
            $productPriceModel->setProductId($identityModel);
            
            $productPriceModel->setQuantity((double)'1');
            
            if ($customerGroupId != '') {
                $return[] =     $productPriceModel;
            }
        }
        return $return;
    }
    
    public function getProductPrice($param)
    {   
        $sqlResult = $this->db->query("SELECT * FROM oxarticles WHERE OXID = '{$param['OXID']}'");
        
        return $sqlResult;
    }
    
    public function getNetPrice($oxPrice) {
        
        if($this->checkEnterNetPrice()){
            $netPrice = $oxPrice;
        }else{
            if(isset($data['OXVAT'])){
                $netPrice = round($oxPrice / "1.{$data['OXVAT']}", 2);
            }else{
                $netPrice = round($oxPrice / "1.{$this->getDefaultVAT()}", 2);
            }
        }
        $netPrice = floatval($netPrice);
        
        return $netPrice;
    }    
}