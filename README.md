# CakePHP 3 CKEditor Plugin

A CakePHP 3.x Plugin to allow the integration of CKEditor into an application.

[![Total Downloads](https://poser.pugx.org/akkaweb/cakephp-ckeditor/downloads.svg)](https://packagist.org/packages/akkaweb/cakephp-ckeditor)
[![License](https://poser.pugx.org/akkaweb/cakephp-ckeditor/license.svg)](https://packagist.org/packages/akkaweb/cakephp-ckeditor)

## Requirements #######################################################
- CakePHP 3.x
- PHP 5.4.6+
- CKEditor - Auto-loaded by this Helper using CKEditor's CDN http://cdn.ckeditor.com/

## Included #######################################################
- CKEditor Helper

## Installation #######################################################

##### Composer (Best Choice)

* Add the following to your `composer.json` located in the root of your application, in the `require` section . ie. `/var/www/domain.com/composer.json`

```php
"require": {
	"akkaweb/cakephp-ckeditor": "dev-master"
}
```

* Run the following at the root of your application

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

* Load the plugin in your application's `bootstrap.php` file:

```php
Plugin::load('AkkaCKEditor', ['bootstrap' => false, 'routes' => true]);
```
 
* Load the plugin's Helper in `AppController.php` 

```php
class AppController extends Controller{
    public $helpers = ['AkkaCKEditor.CKEditor'];

}
```

* Optionally you are able to choose the Version and Distribution of the CKEditor to be loaded. See more details at http://cdn.ckeditor.com/
```php
class AppController extends Controller {
	public $helpers = ['AkkaCKEditor.CKEditor' => [
		'version' => '4.4.7', // Default Option
		'distribution' => 'full' // Default Option / Other options => 'basic', 'standard', 'standard-all', 'full-all'
	]];
}
```

## Usage #######################################################

##### Helper Template File Setup

- Add `<?php echo $this->CKEditor->loadJs(); ?>` inside the application `default.ctp` file right before `</head>` tag. This will allow CKEditor to be available througout the application. It can also be loaded inside the template file as the first line or before the `textarea` where you want to apply the CKEditor. 

##### CKEditor.replace

Insert the following code immediately after the textarea you want CKEditor applied
````
// replace(field-name)  -> replace takes field_name and can be used multiple times throughout your application
	
<?php echo $this->Form->input('body'); ?> // Example
<?php echo $this->CKEditor->replace('body'); ?>
````



## Disclaimer
Although we have done many tests to ensure this plugin works as intended, we advise you to use it at your own risk. As with anything else, you should first test any addition to your application in a test environment. Please provide any fixes or enhancements via issue or pull request.
