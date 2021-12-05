# Widget Basket Modelling

A simple modelling of Widget Basket Solution
The solution is framework-agnostic. Can be integrated with any modern PHP framework, especially with PSR-4 namespace support.

## Functionality

- Add Item
- Get Total with Delivery Cost Calculation

## Implementations

- PSR namespaces
- Composer metapackage
- Generic Data Provider. The default data provider is ArrayDataProvider.
  We can improve to add MySqlDataProvider or PostgresDataProvider to implement persistence.
- Generic Delivery Cost calculation. 
  We can dynamically configure the delivery cost and applying new delivery cost values will not require a new commit.

## How to use

1. Add this repo as your composer dependencies in your existing project
2. Include this repo as a git-sub-module into existing project and import it with PSR-4 namespace
3. Manually download the source code, then set up the namespace into your existing project

## QA / Tests

Every time you add or update a code make sure the tests are passed before commit

```shell
composer test
```
