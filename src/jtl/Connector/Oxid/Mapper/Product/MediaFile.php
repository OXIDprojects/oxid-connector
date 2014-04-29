<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\MediaFile as MediaFileModel;

/**
 * Summary of MediaFile
 */
class MediaFile extends BaseMapper
{
    
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $identity = new IdentityModel();
        $mediaFileModel = new MediaFileModel();
        
        foreach ($params as $value)
        {
            for ($i = 1; $i < 14; $i++)
            {   
                if(!empty($value["OXPIC{$i}"]) or
                   !empty($value["OXTHUMB"]) or
                   !empty($value["OXICON"]))
                {
                    $identity->setEndpoint("{$value['OXID']}_{$i}");
                    $mediaFileModel->setId($identity);
                    
                    $identity->setEndpoint($value['OXID']);
                    $mediaFileModel->setProductId($identity);
                    
                    $mediaFileModel->setSort($i);
                    
                    switch ($i)
                    {
                        case 13:
                            if(!empty($value['OXICON']))
                            {
                                $mediaFileModel->setPath($this->getPicPath("icon"));
                                $mediaFileModel->setUrl($this->getPicUrl("icon", $value['OXICON']));
                                $mediaFileModel->setType($this->getPicType($value['OXICON']));
                            }
                            break;
                        
                        case 14:
                            if(!empty($value['OXTHUMB']))
                            {
                                $mediaFileModel->setPath($this->getPicPath("thumb"));
                                $mediaFileModel->setUrl($this->getPicUrl("thumb", $value['OXTHUMB']));
                                $mediaFileModel->setType($this->getPicType($value['OXTHUMB']));    
                            }                               
                            break;
                        
                        default:
                            if(!empty($value["OXPIC{$i}"]))
                            {
                                $mediaFileModel->setPath($this->getPicPath($i));
                                $mediaFileModel->setUrl($this->getPicUrl($i, $value["OXPIC{$i}"]));
                                $mediaFileModel->setType($this->getPicType($value["OXPIC{$i}"]));
                            }
                            break;
                    }

                    $container->add('media_file', $mediaFileModel->getPublic(), false);
                }
            }    
        }
    }
    
    public function getMediaFile()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * FROM oxarticles ORDER BY OXPARENTID ASC;");
        
        return $sqlResult;
    }
    
    private function getPicPath($picFolder)
    {   
        $picPath = OXID_DIR . "out/pictures/master/product/{$picFolder}";
               
        return $picPath;
    }
    
    private function getPicUrl($picFolder, $picName)
    {
        $oxidConf = new Config();
        
        $picURL = "{$oxidConf->sShopURL}/out/pictures/master/product/{$picFolder}/{$picName}";
        
        return $picURL;
    }
    
    private function getPicType($picName)
    {
        preg_match('/\.([^.]*)/i', $picName, $picType);
        
        return $picType[1];
    }
}

/* non mapped properties
 * CrossSelling:
 * - MediaFileCategory
 */