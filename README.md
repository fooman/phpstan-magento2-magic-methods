PHPSTAN Extension - Magento 2 Magic Methods
===================

### Installation Instructions via Composer

Add this repository to your root composer.json file:

    composer config repositories.phpstan-magento2-magic-methods vcs http://github.com/fooman/phpstan-magento2-magic-methods

then run:

    composer require --dev fooman/phpstan-magento2-magic-methods:dev-master
 
in your phpstan.neon configuration file load this extension 
  
    includes:
        - vendor/fooman/phpstan-magento2-magic-methods/extension.neon
