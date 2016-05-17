Widget for bootstrap-iconpicker 2.0
===============================
Widget for bootstrap-iconpicker plugin http://victor-valencia.github.io/bootstrap-iconpicker/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist insolita/yii2-iconpicker "~2.0"
```

or add

```
"insolita/yii2-iconpicker": "~2.0"
```

to the require section of your `composer.json` file.

Requirements
------------
This extension require twitter-bootstrap >3.0
You can use it for 
glyphicon, ionicon, fontawesome, weathericon, mapicon, octicon, typicon, elusiveicon
By default - native bootstrap glyphicon

NOTE! This extension not provide assets for icon source - you can setup and register it`s in view separately

Suggestions:
 - https://packagist.org/packages/rmrevin/yii2-fontawesome
 - https://packagist.org/packages/rmrevin/yii2-ionicon
 - https://packagist.org/packages/mervick/yii2-material-design-icons
 - https://github.com/stephenhutchings/typicons.font
 - https://github.com/github/octicons
 - https://github.com/reduxframework/elusive-icons
 - https://github.com/erikflowers/weather-icons


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
 
CHANGELOG 2.0.0 
-----
 
 - Remove font-awesome depend
 - Use original bower component
 - remove $columns, $rows, $placement properties
 - add $clientOptions property with plugin configurations
 - remove $removePrefix property
 - add $onSelectIconCallback property for add custom javascript behavior after select icon
