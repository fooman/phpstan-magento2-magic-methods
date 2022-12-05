We are likely going to stop supporting this package in the near future. Changes in phpstan's autoloading are surfacing load order / class existence leading to classes being generated when they should be found via Composer's autoloading. As https://github.com/bitExpert/phpstan-magento does not have the same issue and does provide similar functionality we suggest checking it out instead as we will likely adopt it for our uses.

PHPStan Extension - Magento 2 Magic Methods
===================

The extension bootstraps the same autoloader that is run when using Magento 2's unit tests. By default it will place
the generated class under var/. Change the environment variable `TESTS_TEMP_DIR` to change the folder.

### Installation Instructions via Composer

    composer require --dev fooman/phpstan-magento2-magic-methods:^0.7
 
 
### Note on required use of `phpstan/extension-installer`
<details>
  <summary>Manual installation</summary>

If the use of `phpstan/extension-installer` is not working for you undo the installation by adding
```
    "replace": {
        "phpstan/extension-installer": "*"
    },
```
to your project's composer.json file. Then manually include extension.neon in your project's PHPStan config:

```
includes:
    - vendor/fooman/phpstan-magento2-magic-methods/extension.neon
```

Or as an alternative approach you can check out https://github.com/bitExpert/phpstan-magento

</details>
