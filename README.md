# Noomaa Coding Standards
PHP_CodeSniffer rules (sniffs) to enforce Noomaa's Coding Standards.

## Requirements

The Noomaa Coding Standards require PHP 7.0.0 or higher and [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) version 3.5.0 or higher.

## Installation

1. Install PHP_CodeSniffer by following its [installation instructions](https://github.com/squizlabs/PHP_CodeSniffer#installation) (via Composer, Phar file, PEAR, or Git checkout).

   Do ensure that PHP_CodeSniffer's version matches our [requirements](#requirements).

2. Install Noomaa standards globally:

        composer global require noomaa/codingstandards

    OR DEV version

        composer global require noomaa/codingstandards:dev-main

3. Setting the default standard to be the Noomaa coding standard

        phpcs --config-set default_standard Noomaa

## How to use

### Command line

Run the `phpcs` command line tool on a given file or directory, for example:

    phpcs --standard=Noomaa test-file.php

### Using PHPCS and Noomaa Coding Standards from within your IDE
* **Visual Studio**: Please see "[Setting up PHP CodeSniffer in Visual Studio Code](https://tommcfarlin.com/php-codesniffer-in-visual-studio-code/)", a tutorial by Tom McFarlin.
