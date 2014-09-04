<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Model\Image as ImageModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of Image
 */
class Image extends BaseMapper
{   
    public function pull($data=null, $offset=0, $limit=null)
    {             
        $result = [];
            
        $sqlResult = $this->db->query("SELECT * FROM oxarticles WHERE OXPARENTID = '' ORDER BY OXPARENTID ASC");

        foreach ($sqlResult as $data)
        {           
            for ($i = 1; $i < 14; $i++)
            {
                    $imageModel = new ImageModel();
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($data['OXID']);
                    $imageModel->setForeignKey($identityModel);
                    
                    $imageModel->setRelationType("product");
                    
                    $imageModel->setSort($i);
                                        
                    switch ($i)
                    {
                        case 13:
                            if(!empty($data['OXICON']))
                            {
                                $imageModel->setFilename($this->getPicUrl("icon", $data['OXICON']));
                                
                                $identityModel = new IdentityModel();
                                $identityModel->setEndpoint($data['OXID'] . "OXICON");
                                $imageModel->setId($identityModel);
                            }
                            break;
                        
                        case 14:
                            if(!empty($data['OXTHUMB']))
                            {
                                $imageModel->setFilename($this->getPicUrl("thumb", $data['OXTHUMB']));
                                
                                $identityModel = new IdentityModel();
                                $identityModel->setEndpoint($data['OXID'] . "OXTHUMB");
                                $imageModel->setId($identityModel);
                            }                               
                            break;
                        
                        default:
                            if(!empty($data["OXPIC{$i}"]))
                            {
                                $imageModel->setFilename($this->getPicUrl($i, $data["OXPIC{$i}"]));
                                
                                $identityModel = new IdentityModel();
                                $identityModel->setEndpoint($data['OXID'] . "OXPIC{$i}");
                                $imageModel->setId($identityModel);
                            }
                            break;
                    }
                    if ($imageModel->getFilename()) {
                        $result[] = $imageModel->getPublic();
                    }
                }
    	    }  
        return $result;
    }
        
    private function getPicUrl($picFolder, $picName)
    {
        $oxidConf = new Config();
        
        $picURL = "{$oxidConf->sShopURL}/out/pictures/master/product/{$picFolder}/{$picName}";
        
        return $picURL;
    }
}