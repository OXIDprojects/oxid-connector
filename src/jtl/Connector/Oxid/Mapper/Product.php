<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Product extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxarticles",
            "mapPull" => array(
                "considerStock" => null,
                "permitNegativeStock" => null,
                "id" => "OXID",
                "masterProductId" => "OXPARENTID",//
                "manufacturerId" => "OXMANUFACTURERID",
                "unitId" => "OXUNITNAME",
                "sku" => "OXARTNUM",
                "stockLevel" => "OXSTOCK",
                "vat" => null,
                "minimumOrderQuantity" => "OXUNITQUANTITY",
                "ean" => "OXEAN",
                "productWeight" => "OXWEIGHT",
                "recommendedRetailPrice" => "OXTPRICE",
                "keywords" => "OXSEARCHKEYS",
                "sort" => "OXSORT",
                "created" => null,
                "availableFrom" => null,
                "manufacturerNumber" => "OXMPN",
                "isMasterProduct" => null,
                "inflowDate" => null,
                "prices" => "ProductPrice|addPrice",
                "variations" => "ProductVariation|addVariation",
                "i18ns" => "ProductI18n|addI18n",
                "fileDownloads" => "ProductFileDownload|addFileDownload",
                "categories" => "Product2Category|addCategory"
            ),
           "mapPush" => array(
                "OXID" => "id",
                "OXPARENTID" => "masterProductId",
                "OXMANUFACTURERID" => "manufacturerId",
                "OXUNITNAME" => "unitId",
                "OXARTNUM" => "sku",
                "OXSTOCK" => "stockLevel",
                "OXUNITQUANTITY" => "minimumOrderQuantity",
                "OXEAN" => "ean",
                "OXWEIGHT" => "productWeight",
                "OXTPRICE" => "recommendedRetailPrice",
                "OXSEARCHKEYS" => "keywords",
                "OXSORT" => "sort",
                "OXINSERT" => "created",
                "OXACTIVEFROM" => "availableFrom",
                "OXMPN" => "manufacturerNumber"
               )
        );
    
    public function created($data)
    {
        return $this->stringToDateTime($data['OXINSERT']);
    }
    
    public function availableFrom($data)
    {
        return $this->stringToDateTime($data['OXACTIVEFROM']);
    }
    
    public function isMasterProduct($data)
    {            
            $sqlResult = $this->db->query("SELECT Count(OXPARENTID) AS ParentCount FROM oxid_michele.oxarticles
                                            WHERE OXPARENTID = '{$data['OXID']}'");
            
            if(($sqlResult[0]['ParentCount'] != 0))
            {
                return true;
            }            
        return false;
    }   
    
    public function vat($data)
    {
        if($data['OXVAT'])
        {
            return $data['OXVAT'];
        }else{
            return $this->getDefaultVAT('dDefaultVAT');
        }
    }
    
    public function inflowDate($data)
    {
        if($data['OXDELIVERY'] != '0000-00-00')
        {
            return $this->stringToDateTime($data['OXDELIVERY']);
        }else{
            return null;
        }
    }
    
    public function considerStock($data)
    {
        if($data['OXSTOCK'] >= 1 and $data['OXSTOCKFLAG'] == 1)
        {
            return true;
        }else{
            return false;
        }
    }
    
    public function permitNegativeStock($data)
    {
        if($data['OXSTOCK'] >= 1 and $data['OXSTOCKFLAG'] == 1)
        {
            return true;
        }else{
            return false;
        }
    }
}