Widget for bootstrap-iconpicker 3.0
===================================

Widget for bootstrap-iconpicker plugin http://victor-valencia.github.io/bootstrap-iconpicker/

Now based on more actual fork https://github.com/eliberty/bootstrap-iconpicker

FontAwesome 4.7.0 support

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist insolita/yii2-iconpicker "^3.0"
```

or add

```
"insolita/yii2-iconpicker": "^3.0"
```

to the require section of your `composer.json` file.

Requirements
------------
This extension require twitter-bootstrap >3.0
You can use it for 
 - glyphicon  (with bootstrap by default)
 - ionicon       https://packagist.org/packages/rmrevin/yii2-ionicon
 - fontawesome   https://packagist.org/packages/rmrevin/yii2-fontawesome
 - weathericon   https://github.com/erikflowers/weather-icons
 - mapicon
 - octicon        https://github.com/github/octicons
 - typicon        https://github.com/stephenhutchings/typicons.font
 - elusiveicon    https://github.com/reduxframework/elusive-icons
 - materialdesign https://packagist.org/packages/mervick/yii2-material-design-icons

By default - native bootstrap glyphicon

###NOTE!
This extension not provide assets for icon source - you can setup and register it`s in view separately
You can create needed assets, or direct include css of icon fonts from folder @bower/eliberty-bootstrap-iconpicker/icon-fonts

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'icon')->widget('\insolita\iconpicker\Iconpicker',
 [
   'iconset'=>'fontawesome',
   'clientOptions'=>['rows'=>8,'cols'=>10,'placement'=>'right'],
 ])->label('Choose icon'); ?>
 ```

 or without ActiveForm

 ```php
 <?php
    echo \insolita\iconpicker\Iconpicker::widget([
        'id'=>'choose_icon',
        'name'=>'myicon',
        'value'=>'glyphicon-cog',
        'iconset'=>'glyphicon',
        'pickerOptions'=>['class'=>'btn btn-primary'],
        'clientOptions'=>['placement'=>'bottom','search'=>false],
    ]);
 ?>
 ```
