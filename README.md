# oxid-esales/graphql-module-skeleton


[![PHP Version](https://img.shields.io/packagist/php-v/oxid-esales/graphql-module-skeleton.svg?style=for-the-badge)](https://github.com/oxid-esales/graphql-module-skeleton) [![Stable Version](https://img.shields.io/packagist/v/oxid-esales/graphql-module-skeleton.svg?style=for-the-badge&label=latest)](https://packagist.org/packages/oxid-esales/graphql-module-skeleton)

## What is this?

This skeleton will set you up with a

- basic GraphQL module for OXID eShop
- including a sane `README.md`
- pre setup `NamespaceMapper`
- simple example controller
- nice developement experience

## How to use

```bash
$ composer create-project oxid-esales/graphql-module-skeleton
```

This provides you with a basic GraphQL OXID module. To install this freshly created module into your OXID eShop you can:

```bash
$ composer config repositories.graphql path path-to-module/that-you-just-created
$ composer require my-vendor/my-package
```

Make sure that `my-vendor/my-package` matches the package name in the package `composer.json`.

## License

GPLv3, see [LICENSE file](LICENSE).
