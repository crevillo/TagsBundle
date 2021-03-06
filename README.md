Netgen Tags Bundle [![Build status](https://travis-ci.org/netgen/TagsBundle.png)](https://travis-ci.org/netgen/TagsBundle)
==================

Netgen Tags Bundle is an eZ Publish / eZ Platform bundle for taxonomy management and easier classification of content, providing more functionality for tagging content than `ezkeyword` field type included in eZ Publish kernel.

This repository represents a rewrite of eZ Tags, the original eZ Publish 4 extension located at [https://github.com/ezsystems/eztags](https://github.com/ezsystems/eztags). However, eZ Publish 4 version of eZ Tags is still required to administrate tags through the admin interface.

Implemented features
--------------------

* `eztags` field type
* Tags service and legacy SPI handler
* Signal slot tags service
* `/tags/id/{tagId}` and `/tags/view/{tagUrl}` pages
* `TagId` and `TagKeyword` search criteria
* Solr indexing of `eztags` field type
* Tag router and path generator
* REST interface

License and installation instructions
-------------------------------------

[License](LICENSE)

[Installation instructions](Resources/doc/INSTALL.md)

[Upgrade instructions](Resources/doc/UPGRADE.md)

[Changelogs](Resources/doc/)

Unit tests
----------

There are two sets of tests available, unit tests and legacy integration tests.

To run the tests, first you need to install dependencies with Composer:

    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install

After that, copy (or symlink) `config.php-DEVELOPMENT` file from TagsBundle to `config.php` in eZ Publish kernel:

    $ cp config.php-DEVELOPMENT vendor/ezsystems/ezpublish-kernel/config.php

### Running unit tests

    $ phpunit -c phpunit.xml

### Running legacy integration tests

    $ phpunit -c phpunit-integration-legacy.xml
