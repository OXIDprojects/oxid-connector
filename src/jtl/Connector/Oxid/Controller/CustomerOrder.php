<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Exception\TransactionException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrder as CustomerOrderMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderItem as CustomerOrderItemMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderShippingAddress as CustomerOrderShippingAddressMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderBillingAddress as CustomerOrderBillingAddressMapper;


class CustomerOrder extends BaseController {
    
}

/* non mapped class
 * - CustomerOrderAttr
 * - CustomerOrderItemVariation
 */