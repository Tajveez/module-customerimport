# Magento 2 module to Import Customer from different sources using CLI


-   [Main Functionalities](#markdown-header-main-functionalities)
-   [Installation](#markdown-header-installation)
-   [Configuration](#markdown-header-configuration)
-   [Specifications](#markdown-header-specifications)
-   [Attributes](#markdown-header-attributes)

## Main Functionalities

Customer Import Module
PHP v7.4
Magento v2.4.2

## Installation

\* = in production please use the `--keep-generated` option

### Type 1: Zip file

-   Unzip the zip file in `app/code/Tajveez`
-   Enable the module by running `php bin/magento module:enable Tajveez_CustomerImport`
-   Apply database updates by running `php bin/magento setup:upgrade`\*
-   Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

-   `composer require tajveez/module-customerimport`

## Specifications & usage

-   Console Command

    -   Used to import customer using different profiles

-   Commands
    -   `php bin/magento customer:import:profile-list` Shows list of all available profiles
    -   `php bin/magento customer:import <profile-name> <file-path>` Imports sample.json file using sample-json profile
        - `profile-name` give available profile name i.e. sample-json, sample-csv      
        - `file-path` give file path from your magento root directory i.e. `var/sample.json`
