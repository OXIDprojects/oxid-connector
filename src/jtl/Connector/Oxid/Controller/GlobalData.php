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
use jtl\Connector\Oxid\Mapper\GlobalData\Unit as UnitMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Company as CompanyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\TaxRate as TaxRateMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\UnitI18n as UnitI18nMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Currency as CurrencyMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\Language as LanguageMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownload as FileDownloadMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\CustomerGroup as CustomerGroupMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\ShippingClass as ShippingClassMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\MeasurementUnit as MeasurementUnitMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\FileDownloadI18n as FileDownloadI18nMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\CustomerGroupI18n as CustomerGroupI18nMapper;
use jtl\Connector\Oxid\Mapper\GlobalData\MeasurementUnitI18n as MeasurementUnitI18nMapper;


class GlobalData extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        $filter = new QueryFilter();
        $filter->set($params);
        
        try
        {
            $container = new GlobalDataContainer();
            
            $unitMapper = new UnitMapper();
            $companyMapper = new CompanyMapper();
            $taxRateMapper = new TaxRateMapper();
            $languageMapper = new LanguageMapper();
            $currencyMapper = new CurrencyMapper();
            $unitI18nMapper = new UnitI18nMapper();
            $fileDownloadMapper = new FileDownloadMapper();
            $customerGroupMapper = new CustomerGroupMapper();
            $shippingClassMapper = new ShippingClassMapper();
            $measurementUnitMapper = new MeasurementUnitMapper();
            $fileDownloadI18nMapper = new FileDownloadI18nMapper();
            $customerGroupI18nMapper = new CustomerGroupI18nMapper();
            $measurementUnitI18nMapper = new MeasurementUnitI18nMapper();
                       
            $unitMapper->fetchAll($container, 'unit', $unitMapper->getUnit());
            $companyMapper->fetchAll($container, 'company');
            $taxRateMapper->fetchAll($container, 'tax_rate', $taxRateMapper->getTaxRate());
            $languageMapper->fetchAll($container, 'language', $languageMapper->getLanguageIDs());
            $currencyMapper->fetchAll($container, 'currency', $currencyMapper->getCurrency());
            $unitI18nMapper->fetchAll($container, 'unit_i18n', $unitI18nMapper->getUnitI18n());
            $fileDownloadMapper->fetchAll($container, 'file_download');
            $customerGroupMapper->fetchAll($container, 'customer_group');
            $shippingClassMapper->fetchAll($container, 'shipping_class');
            $measurementUnitMapper->fetchAll($container, 'measurement_unit');
            $fileDownloadI18nMapper->fetchAll($container, 'file_download_i18n');
            $customerGroupI18nMapper->fetchAll($container, 'customer_group_i18n', $customerGroupI18nMapper->getCustomerGroupI18n());
            // $measurementUnitI18nMapper->fetchAll($container, 'measurement_unit_i18n');
            
            $result[] = $container->getPublic(array('items'));
			
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
    
    public function commit($params,$trid) {
        $action = new Action();
        $action->setHandled(true);
        
        try {
            $container = TransactionHandler::getContainer($this->getMethod()->getController(), $trid);    

            $result = new TransactionResult();
            
            $unitMapper = new UnitMapper();
            $companyMapper = new CompanyMapper();
            $taxRateMapper = new TaxRateMapper();
            $languageMapper = new LanguageMapper();
            $currencyMapper = new CurrencyMapper();
            $unitI18nMapper = new UnitI18nMapper();
            $fileDownloadMapper = new FileDownloadMapper();
            $customerGroupMapper = new CustomerGroupMapper();
            $shippingClassMapper = new ShippingClassMapper();
            $measurementUnitMapper = new MeasurementUnitMapper();
            $fileDownloadI18nMapper = new FileDownloadI18nMapper();
            $customerGroupI18nMapper = new CustomerGroupI18nMapper();
            $measurementUnitI18nMapper = new MeasurementUnitI18nMapper();
            
            $unitMapper->updateAll($conrainer->get('unit'));
            $companyMapper->updateAll($container->get('company'));
            $taxRateMapper->updateAll($container->get('tax_rate'));
            $languageMapper->updateAll($container->get('language'));
            $currencyMapper->updateAll($container->get('currency'));
            $unitI18nMapper->updateAll($container->get('unit_i18n'));
            $fileDownloadMapper->updateAll($container->get('file_download'));
            $customerGroupMapper->updateAll($container->get('customer_group'));
            $shippingClassMapper->updateAll($container->get('shipping_class'));
            $measurementUnitMapper->updateAll($container->get('measurement_unit'));
            $fileDownloadI18nMapper->updateAll($container->get('file_download_i18n'));
            $customerGroupI18nMapper->updateAll($container->get('customer_group_i18n'));
            $measurementUnitI18nMapper->updateAll($container->get('measurement_unit_i18n'));

            $action->setResult($result->getPublic());            
        }
        catch (\Exception $exc) {
            
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
 * - ProductType
 * - ConfigGroup
 * - ConfigGroupI18n
 * - ConfigItem
 * - ConfigItemI18n
 * - ConfigItemPrice
 */