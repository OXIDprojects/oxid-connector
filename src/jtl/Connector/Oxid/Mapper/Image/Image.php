<?php
namespace jtl\Connector\Oxid\Mapper\Image;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ImageContainer;
use jtl\Connector\Model\Image as ImageModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of Image
 */
class Image extends BaseMapper
{   
    public function fetchAll($container=null,$type=null,$params=null) 
    {             
        $result = [];
        
        $sqlResult = $this->_db->query("SELECT * FROM oxarticles WHERE OXPARENTID = '' ORDER BY OXPARENTID ASC LIMIT {$params['offset']},{$params['limit']};");

        foreach ($sqlResult as $data)
        {           
            for ($i = 1; $i < 14; $i++)
            {                          
                    $imageContainer = new ImageContainer();
                    $imageModel = new ImageModel();
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($data['OXID']);
                    $imageModel->setForeignKey($identityModel);
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($this->generateUId());
                    $imageModel->setId($identityModel);
                    
                    $imageModel->setRelationType("product");
                    
                    $imageModel->setSort($i);
                    
                    switch ($i)
                    {
                        case 13:
                            if(!empty($data['OXICON']))
                            {
                                $imageModel->setFilename($this->getPicUrl("icon", $data['OXICON']));
                            }
                            break;
                        
                        case 14:
                            if(!empty($data['OXTHUMB']))
                            {
                                $imageModel->setFilename($this->getPicUrl("thumb", $data['OXTHUMB']));
                            }                               
                            break;
                        
                        default:
                            if(!empty($data["OXPIC{$i}"]))
                            {
                                $imageModel->setFilename($this->getPicUrl($i, $data["OXPIC{$i}"]));
                            }
                            break;
                    }
                        if ($imageModel->getFilename()) {
                            $result[] = $imageModel->getPublic();
                        }
            }
    	}
        //Test-Ausgabe:
        $this->fetchCount();
        
        return $result;
    }
    
    public function fetchCount() {
	    $count = 0;
        
        for ($i = 1; $i < 14; $i++)
        { 
            switch ($i)
            {
                case 13:
                    $objs = $this->_db->query("SELECT count(*) as count FROM oxarticles WHERE OXPARENTID = '' AND OXICON  <> '' LIMIT 1;", array("return" => "object"));
                    if ($objs !== null) {
                        $count = $count + intval($objs[0]->count);
                    }
                    break;
                case 14:
                    $objs = $this->_db->query("SELECT count(*) as count FROM oxarticles WHERE OXPARENTID = '' AND OXTHUMB  <> '' LIMIT 1;", array("return" => "object"));
                    if ($objs !== null) {
                        $count = $count + intval($objs[0]->count);
                    }
                    break;
                default:
                    $objs = $this->_db->query("SELECT count(*) as count FROM oxarticles WHERE OXPARENTID = '' AND OXPIC{$i} <> '' LIMIT 1;", array("return" => "object"));
                    if ($objs !== null) {
                        $count = $count + intval($objs[0]->count);
                    }
                    break;
            }
        }
        
        if ($count !== null) {
            return $count;
	    }
	    return 0;
	}
    
    private function getPicUrl($picFolder, $picName)
    {
        $oxidConf = new Config();
        
        $picURL = "{$oxidConf->sShopURL}/out/pictures/master/product/{$picFolder}/{$picName}";
        
        return $picURL;
    }
}
/* non mapped properties
Image:

 */