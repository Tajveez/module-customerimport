# Mage2 Module Tajveez CustomerImport

    ``tajveez/module-customerimport``

-   [Main Functionalities](#markdown-header-main-functionalities)
-   [Installation](#markdown-header-installation)
-   [Configuration](#markdown-header-configuration)
-   [Specifications](#markdown-header-specifications)
-   [Attributes](#markdown-header-attributes)

## Main Functionalities

Customer Import Module

## Installation

\* = in production please use the `--keep-generated` option

### Type 1: Zip file

-   Unzip the zip file in `app/code/Tajveez`
-   Enable the module by running `php bin/magento module:enable Tajveez_CustomerImport`
-   Apply database updates by running `php bin/magento setup:upgrade`\*
-   Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

-   Make the module available in a composer repository for example:
    -   private repository `repo.magento.com`
    -   public repository `packagist.org`
    -   public github repository as vcs
-   Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
-   Install the module composer by running `composer require tajveez/module-customerimport`
-   enable the module by running `php bin/magento module:enable Tajveez_CustomerImport`
-   apply database updates by running `php bin/magento setup:upgrade`\*
-   Flush the cache by running `php bin/magento cache:flush`

## Specifications & usage

-   Console Command

    -   Used to import customer using different profiles

-   Commands
    -   `php bin/magento customer:import:profile-list` Shows list of all available profiles
    -   `php bin/magento customer:import sample-json sample.json` Imports sample.json file using sample-json profile
