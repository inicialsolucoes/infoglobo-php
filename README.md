# Info Globo Integration (PHP)

[![Latest Stable Version](http://poser.pugx.org/inicial/infoglobo-php/v)](https://packagist.org/packages/inicial/infoglobo-php) [![Total Downloads](http://poser.pugx.org/inicial/infoglobo-php/downloads)](https://packagist.org/packages/inicial/infoglobo-php) [![Latest Unstable Version](http://poser.pugx.org/inicial/infoglobo-php/v/unstable)](https://packagist.org/packages/inicial/infoglobo-php) [![License](http://poser.pugx.org/inicial/infoglobo-php/license)](https://packagist.org/packages/inicial/infoglobo-php) [![PHP Version Require](http://poser.pugx.org/inicial/infoglobo-php/require/php)](https://packagist.org/packages/inicial/infoglobo-php)

### Description

Check if customer is subscriber, subscription profile and segment.

### Requirements

[Guzzle, PHP HTTP client](https://github.com/guzzle/guzzle)

### Installing

Run the Composer command to install the latest stable version:

```bash
php composer.phar -vvv require inicial/infoglobo-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update using composer:

```bash
php composer.phar -vvv update
```

### Example

```php
require_once(dirname(__FILE__) . '/vendor/autoload.php');

$infoGlobo = new InfoGlobo\InfoGlobo();
$infoGlobo->setApiBaseUrl ('https://api-ig.infoglobo.com.br/');
$infoGlobo->setApiAuthUser('username');
$infoGlobo->setApiAuthPass('password');
$infoGlobo->setApiCustomer('customer');

$customer = $infoGlobo->getCustomerByCpf('96356986523');
```

### Note

You can find more info about usage on class source code.

Report any bug or suggest changes using git [issues](https://github.com/inicialsolucoes/infoglobo-php/issues).
