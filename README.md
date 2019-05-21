PHPStan Extension - Magento 2 Magic Methods
===================

The extension bootstraps the same autoloader that is run when using Magento 2's unit tests. By default it will place
the generated class under var/. Change the environment variable `TESTS_TEMP_DIR` to change the folder.

### Installation Instructions via Composer

    composer require --dev fooman/phpstan-magento2-magic-methods
 
