# declension-bundle
Symfony declension bundle (Russian)

Provides declension Symfony service and twig extension with several providers.

Currently configured to use http://morpher.ru/ provider with database cache and microcache wrappers.

### Install
1. `composer require multifinger/declension-bundle` (Add to kernel bundles IF NOT using flex)
2. `bin/console doctrine:schema:update --force`
