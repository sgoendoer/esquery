# json

Elastic Search query for PHP

## Setup

    ./composer require sgoendoer/esquery

or configure your composer.json accordingly

    "require" : { "sgoendoer/esquery": "0.0.1" }

## Usage

```php
    use sgoendoer\esquery\ESQuery;
	use sgoendoer\esquery\ESQueryBuilder;
    
    $esq = (new ESQueryBuilder())->type($type)->build();
```