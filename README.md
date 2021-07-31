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

## Laravel Usage 
```
// .env file
PING4SMS_KEY=xxxxxxxxxxxxxxxxxxxxxx
PING4SMS_SENDER_ID=XXXXX

// config/services.php

'ping4sms' => [
    'key' => env('PING4SMS_KEY'),
    'sender_id' => env('PING4SMS_SENDER_ID'),
],

// in your  Controller.
public function sendSMS() {
    $message = new Ping4SMS(config('services.ping4sms.key'),config('services.ping4sms.sender_id'));
    $message->destination($mobile)->message($message)->route(2)->templateId(123456789)->send();
}

// don't forget clear laravel catch. 
php artisan config:cache

```

## License
MIT

