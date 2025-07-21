<?php

declare(strict_types=1);

namespace Indexiz\AdminCustomizer\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

/**
 * @Data
 */
class Data extends AbstractHelper
{
    /**
     *
     */
    const XML_PATH_ENABLED = 'admincustomizer/general/enabled';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context              $context,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * Check if the module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
    }
}
