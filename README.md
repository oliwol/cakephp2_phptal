# CakePHP2 with PHPTAL View

Change your active folder to your CakePHP App (i.e. myProject):

```bash
cd /var/www/myProject
```

Set up [CakePHP](https://github.com/cakephp/cakephp) as submodule in */var/www/myProject/cakephp* and edit the file */var/www/myProject/index.php* to define custom CAKE_CORE_INCLUDE_PATH:

```php
# File: /var/www/myProject/index.php

define('APP_DIR', 'app');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'cakephp' . DS . 'lib');
define('WEBROOT_DIR', 'webroot');
define('WWW_ROOT', ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS);
```

```bash
git submodule add https://github.com/cakephp/cakephp.git cakephp
git commit -m 'Added CakePHP as a submodule'
cd cakephp
# Get all available Tags
git fetch -a
# List all available Tags
git tag
# Checkout selected Tag
git checkout 2.3.6
cd ..
git commit -m "Changed to CakePHP 2.3.6"
```

Set up [PHPTAL](https://github.com/pornel/PHPTAL.git) as submodule in */var/www/myProject/app/Vendor/PHPTAL*

```bash
git submodule add https://github.com/pornel/PHPTAL.git app/Vendor/PHPTAL
git commit -m "Added PHPTal as a submodule"
cd app/Vendor/PHPTAL
git fetch -a
git tag
git checkout 1.2.2
cd ..\..
git commit -m "Changed to PHPTal 1.2.2"
```

Set up **[cakephp2_phptal](https://github.com/oliwol/cakephp2_phptal)** as submodule in */var/www/myProject/app/Lib/View*

```bash
git submodule add https://github.com/oliwol/cakephp2_phptal.git app/Lib/View
git commit -m "Added CakePHP2PHPTAL as a submodule"
```

In file */var/www/myProject/app/Controller/AppController.php* define new View class in *beforeFilter* method:

```php
function beforeFilter() {
    parent::beforeFilter();
    $this->viewClass = 'Phptal';
}
```
