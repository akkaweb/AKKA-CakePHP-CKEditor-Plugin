# CakePHP 3 CKEditor Plugin

A CakePHP 3.x Plugin to allow the integration of CKEditor into an application.

## Requirements #######################################################
- CakePHP 3.x with Auth component correctly setup. Refer to http://book.cakephp.org/3.0/en/controllers/components/authentication.html for setup
- PHP 5.4.6+

## Included #######################################################
- CKEditor Helper

## Installation #######################################################

##### Composer (Best Choice)

1. Add the following to your `composer.json` located in the root of your application, in the `require` section . ie. `/var/www/domain.com/composer.json`

```php
"require": {
	"akkaweb/cakephp-ckeditor": "dev-master"
}
```

2. Run the following at the root of your application

```
sudo php composer.phar update
```
Note: if `composer.phar` is not found, you need to install it. Follow CakePHP's documentation here -> http://book.cakephp.org/3.0/en/installation.html. Refer to Installing Cakephp section

##### Git Clone
`git clone git@github.com:akkaweb/AKKA-CakePHP-CKEditor-Plugin.git`

##### Download
`https://github.com/akkaweb/AKKA-CakePHP-CKEditor-Plugin/archive/master.zip`

Note: When installing with either manual download or Git Clone and CakePHP complains it cannot find the plugin, you need to add the plugin to `vendor/cakephp-plugins.php` in the `plugins` array [] --> `'AkkaCKEditor' => $baseDir . '/plugins/AkkaCKEditor/'`. If you are using composer, running `php composer.phar dumpautoload` could be sufficient. If it does not work add the following to the `"autoload"` section in the root application's `composer.json` file in the `"psr-4":` section: `"AkkaCKEditor\\": "./plugins/AkkaCKEditor/src"`


## Configuration #######################################################

1. Load the plugin in your application's `bootstrap.php` file:

```php
Plugin::load('AkkaCKEditor', ['bootstrap' => false, 'routes' => true]);
```

2. Load the plugin's Helper in `AppController.php` 

```php
class AppController extends Controller{
    public $helpers = ['AkkaCKEditor.CKEditor'];

}
```

## Usage #######################################################

##### Helper Template File Setup

- Add `<?php echo $this->CKEditor->loadJs(); ?>` inside the application `default.ctp` file right before `</head> or inside the view as the first line or before the `textarea` where you want to apply the CKEditor. 

##### CKEditor.replace

Insert the following code immediately after the textarea you want CKEditor applied
````
Optional Settings Array
* id 	-> Link id
* class -> Link class
* title -> Link title
* style -> Any html style
* label -> Hyperlink text
	
<?php echo $this->Form->input('body'); ?> // Example
<?php echo $this->CKEditor->replace('body'); ?>
````



## Disclaimer
Although we have done many tests to ensure this plugin works as intended, we advise you to use it at your own risk. As with anything else, you should first test any addition to your application in a test environment. Please provide any fixes or enhancements via issue or pull request.
