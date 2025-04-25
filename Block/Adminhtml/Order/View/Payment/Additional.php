<?php
namespace Walley\PayLink\Block\Adminhtml\Order\View\Payment;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Additional extends Template
{
    protected $registry;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getPayLink()
    {
        $order = $this->registry->registry('current_order');
        if (!$order) {
            return '';
        }
        $payment = $order->getPayment();
        $info = $payment->getAdditionalInformation('walley_paylink');
        return is_array($info) ? ($info['paymentLink'] ?? '') : '';
    }
}
