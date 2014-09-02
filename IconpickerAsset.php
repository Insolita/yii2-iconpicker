<?php
/**
 * Created by PhpStorm.
 * User: insolita
 * Date: 16.05.14
 * Time: 13:48
 */

namespace insolita\iconpicker;

use \yii\web\AssetBundle;

class IconpickerAsset extends AssetBundle
{

    public $sourcePath = '@vendor/insolita/yii2-iconpicker/asset/bootstrap-iconpicker';

    public $css
        = [
            'css/bootstrap-iconpicker.min.css',
        ];
    public $js
        = [
            'js/bootstrap-iconpicker.min.js',
        ];
} 