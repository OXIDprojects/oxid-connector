<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Exception\DatabaseException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\GlobalData\Company as CompanyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Currency as CurrencyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Language as LanguageMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownload as FileDownloadMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownloadI18n as FileDownloadI18nMapper;


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
            $languageMapper = new LanguageMapper();
            $currencyMapper = new CurrencyMapper();
            $fileDownloadMapper = new FileDownloadMapper();
            $fileDownloadI18nMapper = new FileDownloadI18nMapper();
                       
            $companyMapper->fetchAll($container, 'company');
            $languageMapper->fetchAll($container, 'language', $languageMapper->getLanguageIDs());
            $currencyMapper->fetchAll($container, 'currency', $currencyMapper->getCurrency());
            $fileDownloadMapper->fetchAll($container, 'file_download');
            $fileDownloadI18nMapper->fetchAll($container, 'file_download_i18n');
            
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
 * - Warehouse
 * - WarehouseI18n
 */