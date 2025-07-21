<?php

declare(strict_types=1);

namespace Indexiz\AdminCustomizer\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * @Config
 */
class Config
{
    /**
     *
     */
    const XML_PATH = 'admincustomizer/';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ScopeConfigInterface  $scopeConfig,
        StoreManagerInterface $storeManager
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * Get a value from Stores > Configuration > Admin Customizer
     *
     * @param string $group The <group> name in system.xml (e.g. 'color_schema')
     * @param string $field The <field> name under that group (e.g. 'mainmenu_bg')
     * @return string|null The saved config value, or null if none
     */
    public function getValue(string $group, string $field): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH . $group . '/' . $field,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
    }
}
