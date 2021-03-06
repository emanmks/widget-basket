# Widget Basket Modelling

A simple modelling of Widget Basket Solution
The solution is framework-agnostic. Can be integrated with any modern PHP framework, especially with PSR-4 namespace support.

## Functionality

- Add Item
- Get Total with Delivery Cost Calculation
- Offer

## Implementations

- PHP8.0+
- PSR namespaces
- Composer metapackage
- Generic Data Provider. The default data provider is ArrayDataProvider.
  We can improve to add MySqlDataProvider or PostgresDataProvider to implement persistence.
- Generic Delivery Cost calculation. 
  We can dynamically configure the delivery cost and applying new delivery cost values will not require a new commit.
- Dynamically configure and apply a new Offer. Limitation: Existing WidgetBasket only supports single offer.

## How to use

1. Add this repo as your composer dependencies in your existing project
```json
{
    "require": {
        "emanmks/widget-basket": "master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:emanmks/widget-basket.git"
        }
    ]
}
```
2. Include this repo as a git-sub-module into existing project and import it with PSR-4 namespace
```json
{
  "autoload": {
    "psr-4": {
      "Eman\\WidgetBasket\\": "path/to/the/git-submodule/"
    }
  }
}
```
3. Manually download the source code, then set up the namespace into your existing project
```json
{
  "autoload": {
    "psr-4": {
      "Eman\\WidgetBasket\\": "path/to/the/dir/"
    }
  }
}
```

Wherever you declare the DI, you only need to add this:
```php
WidgetBasket::class => WidgetBasketFactory::class
```

## QA / Tests

Every time you add or update a code make sure the tests are passed before commit

```shell
composer test
```

## Nice to have

- [ ] Improvement on handling decimal values
- [ ] Entity Classes
- [ ] Organize Classes In Bounded Context
- [ ] Some values can be instantiated in value objects
- [ ] Type checking
- [ ] Mess Detection
