# Info Globo Integration (PHP)

Check if customer is subscriber, subscription profile and segment.

### Requirements

[Guzzle, PHP HTTP client](https://github.com/guzzle/guzzle)

### Installing

Run the Composer command to install the latest stable version:

```bash
php composer.phar require inicial/infoglobo-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Guzzle using composer:

```bash
composer.phar update
```

### Example

```php
require_once(dirname(__FILE__) . '/../vendor/autoload.php');

$infoGlobo = new InfoGlobo\InfoGlobo();
$infoGlobo->setApiBaseUrl ('https://api-ig.infoglobo.com.br/');
$infoGlobo->setApiAuthUser('username');
$infoGlobo->setApiAuthPass('password');
$infoGlobo->setApiCustomer('customer');

$customer = $infoGlobo->getCustomerByCpf('96356986523');
```

### Note

You can find more info about usage on class source code.

Report any bug or suggest changes using git [issues](https://github.com/inicialcombr/infoglobo-php/issues).