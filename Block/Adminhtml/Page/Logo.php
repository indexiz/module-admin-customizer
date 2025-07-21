<?php

declare(strict_types=1);

namespace Indexiz\AdminCustomizer\Block\Adminhtml\Page;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Indexiz\AdminCustomizer\Helper\Data as Helper;
use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\Phrase;

/**
 * @Logo
 */
class Logo extends Template
{
    /**
     *
     */
    const XML_PATH_MENU_LOGO = 'admincustomizer/logos/menu_logo';

    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;
    /**
     * @var Helper
     */
    protected $helper;
    /**
     * @var ProductMetadataInterface
     */
    protected $productMetadata;

    /**
     * @param Context $context
     * @param Helper $helper
     * @param ProductMetadataInterface $productMetadata
     * @param array $data
     */
    public function __construct(
        Context                  $context,
        Helper                   $helper,
        ProductMetadataInterface $productMetadata,
        array                    $data = []
    )
    {
        $this->_scopeConfig = $context->getScopeConfig();
        $this->helper = $helper;
        $this->productMetadata = $productMetadata;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getLogoUrl(): string
    {
        // If module is disabled, return default logo
        if (!$this->helper->isEnabled()) {
            return $this->getDefaultLogoUrl();
        }

        $uploaded = $this->_scopeConfig->getValue(
            self::XML_PATH_MENU_LOGO,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );

        if (!empty($uploaded)) {
            return $this->getBaseMediaUrl() . 'admincustomizer/' . ltrim($uploaded, '/');
        }

        return $this->getDefaultLogoUrl();
    }

    /**
     * @return string
     */
    protected function getDefaultLogoUrl(): string
    {
        $edition = $this->productMetadata->getEdition(); // returns 'Community' or 'Enterprise'

        try {
            if (strtolower($edition) === 'enterprise') {
                return $this->getViewFileUrl('Magento_Enterprise::images/adobe-logo.svg');
            }
        } catch (\Exception $e) {
            // fallback handled below
        }

        return $this->getViewFileUrl('images/magento-icon.svg');
    }

    /**
     * @return string
     */
    protected function getBaseMediaUrl(): string
    {
        return $this->_urlBuilder->getBaseUrl(['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]);
    }

    /**
     * @return Phrase
     */
    public function getLogoAlt(): Phrase
    {
        return __('Admin Dashboard Logo');
    }

    /**
     * @return string
     */
    public function getHomeLink(): string
    {
        return $this->getUrl('adminhtml/dashboard/index');
    }
}
