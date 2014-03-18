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
use jtl\Connector\Oxid\Mapper\GlobalData\TaxRate as TaxRateMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Currency as CurrencyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Language as LanguageMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownload as FileDownloadMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\CustomerGroup as CustomerGroupMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\ShippingClass as ShippingClassMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownloadI18n as FileDownloadI18nMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\CustomerGroupI18n as CustomerGroupI18nMapper;

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
            $taxRateMapper = new TaxRateMapper();
            $languageMapper = new LanguageMapper();
            $currencyMapper = new CurrencyMapper();
            $fileDownloadMapper = new FileDownloadMapper();
            $customerGroupMapper = new CustomerGroupMapper();
            $shippingClassMapper = new ShippingClassMapper();
            $fileDownloadI18nMapper = new FileDownloadI18nMapper();
            $customerGroupI18nMapper = new CustomerGroupI18nMapper();
                       
            $companyMapper->fetchAll($container, 'company');
            $taxRateMapper->fetchAll($container, 'tax_rate', $taxRateMapper->getTaxRate());
            $languageMapper->fetchAll($container, 'language', $languageMapper->getLanguageIDs());
            $currencyMapper->fetchAll($container, 'currency', $currencyMapper->getCurrency());
            $fileDownloadMapper->fetchAll($container, 'file_download');
            $customerGroupMapper->fetchAll($container, 'customer_group');
            $shippingClassMapper->fetchAll($container, 'shipping_class');
            $fileDownloadI18nMapper->fetchAll($container, 'file_download_i18n');
            $customerGroupI18nMapper->fetchAll($container, 'customer_group_i18n', $customerGroupI18nMapper->getCustomerGroupI18n());
            
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
 * - CustomerGroupAttr
 * - DeliveryStatus
 * - CrossSellingGroup
 * - Unit
 * - TaxZone
 * - TaxZoneCountry
 * - TaxClass
 */