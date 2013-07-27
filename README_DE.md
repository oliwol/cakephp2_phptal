# CakePHP2 mit PHPTAL View

Wechsle das aktive Verzeichnis nach deine CakePHP App (z.B. meinProjekt):

```bash
cd /var/www/meinProjekt
```

Erstelle [CakePHP](https://github.com/cakephp/cakephp) als Submodul in */var/www/meinProjekt/cakephp* und editiere die Datei */var/www/meinProjekt/index.php* um die CAKE_CORE_INCLUDE_PATH zu definiern:

```php
# File: /var/www/meinProjekt/index.php

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
git fetch -a
git tag
git checkout 2.3.6
cd ..
git commit -m "Changed to CakePHP 2.3.6"
```

Erstelle [PHPTAL](https://github.com/pornel/PHPTAL.git) als Submodul in */var/www/meinProjekt/app/Vendor/PHPTAL*

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

Erstelle **[cakephp2_phptal](https://github.com/oliwol/cakephp2_phptal)** als Submodul in */var/www/meinProjekt/app/Lib/View*

```bash
git submodule add https://github.com/oliwol/cakephp2_phptal.git app/Lib/View
git commit -m "Added CakePHP2PHPTAL as a submodule"
```

In */var/www/meinProjekt/app/Controller/AppController.php* definierst du die neue View-Klasse im *beforeFilter*:

```php
function beforeFilter() {
    parent::beforeFilter();
    $this->viewClass = 'Phptal';
}
```
