# Installation
You can pull this package in through Composer.

```
composer require capsule-corp-co/printer
```

You will need to add the following lines to `config/app.php`

```php
'providers' => [
    ...
    CapsuleCorp\Printer\PrintNodeCapsuleServiceProvider::class,
    ...
],
'aliases' => [
	...
	'PrintNodeCapsule' => CapsuleCorp\Printer\PrintNodeCapsuleFacade::class,
	....
]
```
Next you will want to publish the config file. 
```
php artisan vendor:publish --provider="CapsuleCorp\Printer\PrintNodeCapsuleServiceProvider"
```

#Configuration

Add your API key to the .env file 
```
PRINT_NODE_API_KEY=apikey
```

# Use

Get all the printers
```php
/*
 * Will return an array of Printer Objects 
 */
PrintNodeCapsule::getPrinters();

/**
 * Print Example
 */

 $printers = PrintNodeCapsule::getPrinters();
 $post_job_arg = array(
     'content' => 'url to a pdf here',
     'printer' => $printer[0],
 );
 $result = PrintNodeCapsule::postPrintJob($post_job_arg);
 ```

 