<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Oxid\Controller
 */
namespace jtl\Connector\Oxid\Controller;use jtl\Connector\Result\Action;

use jtl\Core\Rpc\Error;
use jtl\Connector\Oxid\Controller\BaseController;

/**
 * Connector Controller
 * @access public
 */
class Connector extends BaseController
{
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::statistic()
     */
    public function statistic($params)
    {
        $action = new Action();
        $action->setHandled(true);

        $results = array();
        
        $mainControllers = array(
            'Category',
            'Customer',
            'CustomerOrder',
            //'DeliveryNote',
            'GlobalData',
            'Image',
            'Product',
            'Manufacturer',
            'Specific'
        );
        
        if($params !== null && $params) {
            foreach($mainControllers as $mainController) {
                try {
                    $class = "\\jtl\\Connector\\Oxid\\Controller\\{$mainController}";
                    if(class_exists($class)) {
                        $controllerObj = new $class;
                        if(is_callable(array($controllerObj,'statistic'))) {
                            $result = $controllerObj->statistic($params);
                            if ($result !== null && $result->isHandled()) {
                                $results[] = $result->getResult();
                            }
                        }                        
                    }            
                }
                catch(\Exception $exc) {                	
                }
            }
        }
        
        $action->setResult($results);

        return $action;
    }
}