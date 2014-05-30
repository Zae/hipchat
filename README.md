Zae\HipChat
===========

HipChat API Client

This class provides easy access to v1 of the HipChat API:  
https://www.hipchat.com/docs/api/

Install
-------
Installation via composer is very easy, simply add the package to your composer.json:  

```json
"require": {  
    "zae/hipchat": "*"  
}
```

Or download the code and add the namespace to your autoloader or simply require() the files.  

Usage
-----
Normal:

```php
<?php
$hipchat = new Zae\HipChat\Client();  
$hipchat->sendMessage([  
    'auth_token' => 'XXXXXXXXXXX',  
    'room_id' => XXXX,  
	'from' => 'Zae\HipChat',  
	'notify' => 1,  
	'message' => "This is an example message",  
	'message_format' => 'text'  
]);
```

Laravel 4 Facade:

```php
<?php
HipChat::sendMessage([  
    'auth_token' => 'XXXXXXXXXXX',  
    'room_id' => XXXX,  
	'from' => 'Zae\HipChat',  
	'notify' => 1,  
	'message' => "This is an example message",  
	'message_format' => 'text'  
]);
```

About
=====

License
-------
This project has an MIT license. See the `LICENSE` file for details.

Guzzle 4
--------
The project uses guzzle 4's service descriptions to create an API Client.  

Laravel
-------
The project has easy L4 integration using it's ServiceProvider and Facade.  

add the ServiceProvider to your list of providers in the config/app file:  

```php
'providers' => array(  
	'Zae\HipChat\HipChatServiceProvider'    
)
```

and the Facade to the list of aliases in the config/app file:

```php
'aliases' => array(  
    'HipChat'v=> 'Zae\HipChat\Facades\HipChat'  
)
```

Author
------
Ezra Pool <ezra@tsdme.nl>

TODO
----
- Provide tests
- Better auth technique?
- APIv2