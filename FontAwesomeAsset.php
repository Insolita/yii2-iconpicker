<?php
/**
 * Created by PhpStorm.
 * User: insolita
 * Date: 16.05.14
 * Time: 13:48
 */

namespace insolita\iconpicker;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{

	public $sourcePath = '@vendor/fortawesome/font-awesome';

	public $css
		= [
			'css/font-awesome.min.css',
		];
} 