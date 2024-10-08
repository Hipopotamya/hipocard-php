### Hipocard - PHP Class

This is a PHP class for Hipocard struct.


### Installation

You can install the class via download the class file and include it in your project.


### API Documents

https://dev.hipopotamya.com

## Usage

### Check Epin Status
```php
require_once 'hipocard.php';

$hipocard = new HipocardIntegration();
$hipocard->setApiKey('HIPOCARDSENDBOXAPIKEY00000000001');
$hipocard->setApiSecret('HIPOCARD');
$hipocard->setEpinCode('HIPOCARDSANDBOXEPINCODE123AB0100');
$hipocard->setEpinSecret('HIPOCARD');
$hipocard->setPlayerName('player_name');
$hipocard->setUsedIp('127.0.0.1');

$response = $hipocard->checkEpinStatus();

if (isset($response['success']) && $response['success'] === true) {
    // Epin is valid
} else {
    // Epin is not valid
}
```

### Success Response Example
```json
{
  "success": true,
  "message": "Successful",
  "data": {
    "total_sales": 100,
    "total_sales_multiplied": 10000,
    "total_commission": 5,
    "net_total": 95,
    "currency": "TRY",
    "rounded_total_sales": 100
  }
}
```

### Error Response Example
```json
{
  "success": false,
  "message": "E-PIN Code has been used or is invalid!",
  "error_code": 12
}

```