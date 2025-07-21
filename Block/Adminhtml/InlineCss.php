<?php

declare(strict_types=1);

namespace Indexiz\AdminCustomizer\Block\Adminhtml;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Indexiz\AdminCustomizer\Model\Config as ConfigModel;
use Indexiz\AdminCustomizer\Helper\Data as HelperData;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * @InlineCss
 */
class InlineCss extends Template
{

    /**
     *
     */
    const XML_PATH_DISPLAY_MAGENTO_COLOR = 'admincustomizer/color_schema/change_color';
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /** @var ConfigModel */
    private $config;
    /** @var HelperData */
    private $helper;

    /**
     * @param Context $context
     * @param ConfigModel $config
     * @param HelperData $helper
     * @param ScopeConfigInterface $scopeConfig
     * @param array $data
     */
    public function __construct(
        Context              $context,
        ConfigModel          $config,
        HelperData           $helper,
        ScopeConfigInterface $scopeConfig,
        array                $data = []
    )
    {
        parent::__construct($context, $data);
        $this->config = $config;
        $this->helper = $helper;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Expose the config model to the template
     *
     * @return ConfigModel
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Check if admin customization is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->helper->isEnabled();
    }


    /**
     * @return bool
     */
    public function canChangeColor(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_DISPLAY_MAGENTO_COLOR);
    }
}
