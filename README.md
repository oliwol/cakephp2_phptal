Cakephp 2 mit PHPTAL View
==========================

Lade PHPTAL als Submodul in /var/www/yourapp/lib/Phptal
```bash
cd /var/www/yourapp
git submodule add git://github.com/pornel/PHPTAL.git lib/Phptal
git add .gitmodules
```

Erstelle Cakephp2Phptal als Submodul in /var/www/yourapp/lib/Cakephp2Phptal
```bash
cd /var/www/yourapp
git submodule add git://github.com/oliwol/cakephp2_phptal.git lib/Cakephp2Phptal
git add .gitmodules
```

Lege in /var/www/yourapp/app/View die Datei PhptalView.php an und lade die beiden Bibliotheken
```php
App::import('Vendor','Phptal',array('file' => '../../lib/Phptal/classes/PHPTAL.php'));
App::import('Vendor','Cake2Phptal',array('file' => '../../lib/Cakephp2Phptal/PhptalView.php'));
```

In /var/www/yourapp/app/Controller/AppController.php definierst du die neue View-Klasse im beforeFilter

```php
function beforeFilter()
{
  parent::beforeFilter();
  $this->viewClass = 'Phptal';
}
```
