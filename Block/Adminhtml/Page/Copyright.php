<?php

declare(strict_types=1);

namespace Indexiz\AdminCustomizer\Block\Adminhtml\Page;

use Magento\Backend\Block\Page\Copyright as CoreCopyright;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Indexiz\AdminCustomizer\Helper\Data;

/**
 * @Copyright
 */
class Copyright extends CoreCopyright
{
    /**
     *
     */
    const XML_PATH_CUSTOM_COPYRIGHT = 'admincustomizer/footer/custom_copyright';
    /**
     *
     */
    const XML_PATH_DISPLAY_MAGENTO_COPYRIGHT = 'admincustomizer/footer/change_copyright';

    /**
     * @var Data
     */
    protected $helper;
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param Data $helper
     * @param ScopeConfigInterface $scopeConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        Data                                    $helper,
        ScopeConfigInterface                    $scopeConfig,
        array                                   $data = []
    )
    {
        $this->helper = $helper;
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isModuleEnabled(): bool
    {
        return $this->helper->isEnabled();
    }

    /**
     * @return string
     */
    public function getCustomCopyright(): string
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_CUSTOM_COPYRIGHT);
    }

    /**
     * @return bool
     */
    public function canChangeCopyright(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_DISPLAY_MAGENTO_COPYRIGHT);
    }
}
