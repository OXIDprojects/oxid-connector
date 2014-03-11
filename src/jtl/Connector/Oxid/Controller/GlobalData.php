<?php
namespace jtl\Connector\Oxid\Controller;


use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Result\Transaction as TransactionResult;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Mapper\GlobalData\Company as CompanyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Currency as CurrencyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Language as LanguageMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownload as FileDownloadMapper;
use jtl\Connector\Oxid\Controller\BaseController;


class GlobalData extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new GlobalDataContainer();
            
            $companyMapper = new CompanyMapper();
            $currencyMapper = new CurrencyMapper();
            $languageMapper = new LanguageMapper();
            $fileDownloadMapper = new FileDownloadMapper();
                       
            $companyMapper->fetchAll($container, 'company');
            $fileDownloadMapper->fetchAll($container, 'file_download');
            $currencyMapper->fetchAll($container, 'currency', $currencyMapper->getCurrency());
            $languageMapper->fetchAll($container, 'language', $languageMapper->getLanguageIDs());
             
            $result[] = $container->getPublic(array('items'), array('_fields'));
			
			$action->setResult($result);
        }
        catch (\Exception $exc) 
        {
            $err = new Error();
            $err->setCode($exc->getCode());
            $err->setMessage($exc->getMessage());
            $action->setError($err);
        }
        
        return $action;
        
    }
}

/* non mapped class
 * 
 * - Warehouse
 * 
 */