# iDoklad API v2 integration

PHP7 library for calling iDoklad API (v2). Library is **not stable** yet.

[![StyleCI](https://styleci.io/repos/94907919/shield?branch=master)](https://styleci.io/repos/94907919)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Fousky/iDoklad/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Fousky/iDoklad/?branch=master)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

# Install with Composer

    composer require fousky/idoklad

# Basic usage

```php
use Fousky\Component\iDoklad\Functions as Func;
use Fousky\Component\iDoklad\iDoklad;
use Fousky\Component\iDoklad\iDokladFactory;

/** 
 * Create iDoklad client with specific configuration.
 *
 * @var \Fousky\Component\iDoklad\iDoklad $idoklad
 */
$idoklad = iDokladFactory::create([
    'client_id' => '##TODO:INSERT CLIENT ID##',
    'client_secret' => '##TODO:INSERT CLIENT SECRET##',
]);

/**
 * Execute function (iDokladFunctionInterface), 
 * this will call iDoklad API and returns model object (iDokladModelInterface).
 *
 * @var \Fousky\Component\iDoklad\Model\Contacts\ContactCollectionModel $responseModel
 */
$responseModel = $idoklad->execute(
    new Func\Contacts\GetContacts()
);

/**
 * Here you have response data from iDoklad API in model class
 * @see GetContacts::getModelClass
 */
var_dump($responseModel);
```

# CI code quality check

Try to run `composer ci` where you can find this commands:

* `composer validate --no-check-all`
* `composer install --no-progress --no-interaction --no-suggest --no-scripts`
* `php vendor/bin/phpstan analyze ./ -c phpstan.neon --level=7`
* `parallel-lint -j 10 --exclude vendor ./`
