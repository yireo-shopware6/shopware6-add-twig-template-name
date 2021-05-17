# Shopware 6 template hints

**DEPRECATED: Use https://github.com/FriendsOfShopware/FroshDevelopmentHelper instead**

This plugin adds - once enabled - comments in the HTML document with the names of Twig templates. For example:
```html
<!-- @Storefront/storefront/base.html.twig --><!DOCTYPE html>
<!-- @Storefront/storefront/base.html.twig --><html lang="en-GB" itemscope="itemscope" itemtype="https://schema.org/WebPage">
```

### Usage
```bash
composer require yireo/shopware6-add-twig-template-name
bin/console plugin:refresh
bin/console plugin:install --activate YireoAddTwigTemplateName
bin/console cache:clear 
```

### Disclaimer
The majority of the code of this plugin was proudfully borrowed from the awesome [oroinc/twig-inspector](https://github.com/oroinc/twig-inspector). A Shopware plugin for that tool is in the works too: [yireo-shopware6/shopware6-twig-inspector](https://github.com/yireo-shopware6/shopware6-twig-inspector) 
