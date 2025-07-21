# Indexiz_AdminCustomizer

**Customize and brand your Magento 2 Admin Panel with ease!**

---

##  Overview

The **Admin View Customizer** module by **Indexiz** empowers store owners to personalize their Magento 2 Admin Panel without touching a line of code. Make your admin panel reflect your brand by updating logos, color schemes, and copyright text with a user-friendly configuration.

---

##  Features

- 🎨 Change the **main admin logo** (login page) and **menu logo**
- 🖌 Customize **admin color scheme** including menu and button colors
- 📜 Replace the default Magento **copyright footer**
- 🔒 No core file overrides, upgrade-safe and clean implementation
- 🧠 Conditional system configuration (fields appear only when needed)

---

##  Compatibility

- Magento Open Source and Adobe Commerce
- Version: Magento 2.4.x (tested on 2.4.5 – 2.4.7)
- PHP: 7.4 – 8.2

---

## Installation

### Prerequisite

- Ensure [Indexiz_Base](https://github.com/indexiz/module-base) module is installed.

### Option 1: Using Composer

```bash
composer require indexiz/module-admin-customizer
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
