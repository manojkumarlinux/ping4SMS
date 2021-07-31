# Ping4SMS

## _Send SMS using Ping4SMS_

[Ping4SMS website](http://ping4sms.com)

## Install

via Composer

``` bash
composer require manojkumarlinux/ping4sms
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Ping4SMS\Ping4SMS;

$message = new Ping4SMS('Account key','Sender id');

//  send message
$message->destination('Mobile Number')->message('Your Message')->route('Route Number')->templateId('DLT_Templateid')->send();

// Delivery Report Api
$message->deliveryId("delivery id")->deliveryReport();

// Credits Check Api
$message->route("Route Number")->creditsCheck(); 

```
## Response
```
array(2) {
  ["success"]=>
  string(16) "Successfully Send a SMS."
  ["id"]=>
  int(32961147)
}


// error response 
array(2) {
  ["error"]=>
  string(12) "Invalid user."
  ["code"]=>
  int(101)
}

```
## License
MIT

