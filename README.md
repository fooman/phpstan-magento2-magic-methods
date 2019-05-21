PHPStan Extension - Magento 2 Magic Methods
===================

### Installation

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require --dev fooman/phpstan-magento2-magic-methods
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include extension.neon in your project's PHPStan config:

```
includes:
    - vendor/fooman/phpstan-magento2-magic-methods/extension.neon
```

</details>
