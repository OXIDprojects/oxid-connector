<?php
namespace jtl\Connector\Oxid\Mapper\Product;


use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\ProductPrice as ProductPriceModel;

/**
 * Summary of ProductPrice
 */
class ProductPrice extends BaseMapper
{
    
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $productPriceModel = new ProductPriceModel();  
               
        for ($i = 0; $i <= 3; $i++)       
        {   
            $customerGroupId = '';
            
            switch($i)
            {  
                case (0):
                    $customerGroupId = $this->getDefaultCustomerGroupId();
                    
                    $productPriceModel->setNetPrice($this->getNetPrice($params[0]['OXPRICE']));
                    break;
                case (1):                  
                    if ($params[0]['OXPRICEA'] != '0') {
                        $customerGroupId = 'oxidpricea';
                        
                        $productPriceModel->setNetPrice($this->getNetPrice($params[0]['OXPRICEA']));
                    }
                    break;
                case (2):                    
                    if ($params[0]['OXPRICEB'] != '0') {
                        $customerGroupId = 'oxidpriceb';
                        
                        $productPriceModel->setNetPrice($this->getNetPrice($params[0]['OXPRICEB']));
                    }
                    break;
                case (3):
                    if ($params[0]['OXPRICEC'] != '0') {
                        $customerGroupId = 'oxidpricec';
                        
                        $productPriceModel->setNetPrice($this->getNetPrice($params[0]['OXPRICEC']));
                    }
                    break;
            }
            
            $identityModel = new IdentityModel();                       
            $identityModel->setEndpoint($customerGroupId);
            $productPriceModel->setCustomerGroupId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($params[0]['OXID']);
            $productPriceModel->setProductId($identityModel);
            
            $productPriceModel->setQuantity('1');
            
            if ($customerGroupId != '') {
                $container->add('product_price', $productPriceModel->getPublic(), false);    
            }
        }
    }
    
    public function getProductPrice($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * FROM oxarticles WHERE OXID = '{$param['OXID']}';");
        
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
    
    public function getOXPRICE($data)
    {
        //Testen
        return $data['_netPrice'] * "1,{$data['_vat']}";
    }
}