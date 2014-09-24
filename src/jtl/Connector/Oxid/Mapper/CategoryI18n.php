<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CategoryI18n as CategoryI18nModel;

class CategoryI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $languages = $this->getLanguageIDs();
        $categoryI18nTable = $this->getCategoryI18n($data);
        
        foreach ($categoryI18nTable as $value)
        {
            foreach ($languages as $language)
            {       
                $langBaseId = $language['baseId'];
                
                if($language['baseId'] == 0)
                {   
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']) or
                           !empty($value['OXLONGDESC']))
                        {
                            $categoryI18nModel = new CategoryI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryI18nModel->setCategoryId($identityModel);
                            
                            $categoryI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryI18nModel->setName($value['OXTITLE']);
                            $categoryI18nModel->setUrlPath($value['OXEXTLINK']);
                            $categoryI18nModel->setDescription($value['OXLONGDESC']);
                            
                            $return[] = $categoryI18nModel;
                        }    
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]))
                        {                          
                            $categoryI18nModel = new CategoryI18nModel();
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryI18nModel->setCategoryId($identityModel); 
                            
                            $categoryI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryI18nModel->setName($value["OXTITLE_{$langBaseId}"]);
                            $categoryI18nModel->setUrlPath($value["OXEXTLINK"]);
                            $categoryI18nModel->setDescription($value["OXLONGDESC_{$langBaseId}"]);
                            
                            $return[] = $categoryI18nModel;
                        }
                    }
                }
            }
        }
        return $return;
    }
    
    public function push($parent,$dbObj=null) {
        $return = [];
        
        die(print_r($parent));
        
        $test = new \stdClass();
        $test->title = "";
        
        //foreach($parent->getItems() as $itemData) {
        //    if($itemData->getType() == "product") {
        //        $return[] = $this->generateDbObj($itemData,$dbObj,$parent);
        //        $tax = ($itemData->getPrice() / 100) * $itemData->getVat();
        //        $taxes += $tax;
        //        $sum += $itemData->getPrice() + $tax;
        //    }
        //    elseif($itemData->getType() == "shipping") {
        //        $shippingCosts += $itemData->getPrice();
        //        $tax = ($itemData->getPrice() / 100) * $itemData->getVat();
        //        $taxes += $tax;
        //    }
        //}
        
        //$totals = [];
        
        //$ot_shipping = new \stdClass();
        //$ot_shipping->title = $parent->getShippingMethodName().':';
        //$ot_shipping->text = number_format($shippingCosts,2,',','.').' '.$parent->getCurrencyIso();
        //$ot_shipping->value = $shippingCosts;
        //$ot_shipping->sort_order = 30;
        //$ot_shipping->class = 'ot_shipping';
        //$totals[] = $ot_shipping;
        
        //$ot_subtotal = new \stdClass();
        //$ot_subtotal->title = 'Zwischensumme:';
        //$ot_subtotal->text = number_format($sum,2,',','.').' '.$parent->getCurrencyIso();
        //$ot_subtotal->value = $sum;
        //$ot_subtotal->sort_order = 10;
        //$ot_subtotal->class = 'ot_subtotal';
        //$totals[] = $ot_subtotal;
        
        //$ot_total = new \stdClass();
        //$ot_total->title = '<b>Summe</b>:';
        //$ot_total->text = '<b> '.number_format($sum+$shippingCosts,2,',','.').' '.$parent->getCurrencyIso().'</b>';
        //$ot_total->value = $sum + $shippingCosts;
        //$ot_total->sort_order = 99;
        //$ot_total->class = 'ot_total';
        //$totals[] = $ot_total;
        
        //$ot_tax = new \stdClass();
        //$ot_tax->title = 'Steuer:';
        //$ot_tax->text = number_format($taxes,2,',','.').' '.$parent->getCurrencyIso();
        //$ot_tax->value = $taxes;
        //$ot_tax->sort_order = 30;
        //$ot_tax->class = 'ot_tax';
        //$totals[] = $ot_tax;
        
        //foreach($totals as $total) {
        //    $total->orders_id = $parent->getId()->getEndpoint();
        //    $this->db->deleteInsertRow($total,'orders_total',array('orders_id','class'),array($parent->getId()->getEndpoint(),$total->class));
        //}
        
        //return $return;
    }
    
    
    public function getCategoryI18n($params)
    {   
        $sqlResult = $this->db->query("SELECT * " .
                                        " FROM oxcategories " .
                                        " WHERE oxcategories.OXID = '{$params['OXID']}'");        
        return $sqlResult;
    }
}