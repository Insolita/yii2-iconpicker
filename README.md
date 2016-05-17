Widget for bootstrap-iconpicker
===============================
Widget for bootstrap-iconpicker plugin http://victor-valencia.github.io/bootstrap-iconpicker/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist insolita/yii2-iconpicker "*"
```

or add

```
"insolita/yii2-iconpicker": "*"
```

to the require section of your `composer.json` file.

Requirements
------------
This extension require twitter-bootstrap >3.0. and fontawesome
If you want to use fontawesome iconset  - add depends to your main AssetBundle 'insolita\iconpicker\FontAwesomeAsset'
for register fontawesome css, if it not registered yet

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'icon')->widget('\insolita\iconpicker\Iconpicker',[
'rows'=>6,
'columns'=>8,
'iconset'=>'fontawesome'
    ])->label('Choose icon'); ?>
 ```

 or without ActiveForm

 ```php
 <?php
    echo \insolita\iconpicker\Iconpicker::widget([
        'id'=>'choose_icon',
        'name'=>'myicon',
        'value'=>'glyphicon-cog',
        'iconset'=>'glyphicon'
    ]);
 ?>
 ```