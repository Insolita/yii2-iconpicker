<?php
/**
 * Created by PhpStorm.
 * User: insolita
 * Date: 16.05.14
 * Time: 13:48
 */

namespace insolita\iconpicker\assets;

use yii\helpers\ArrayHelper;
use yii\web\AssetBundle;

class IconpickerAsset extends AssetBundle
{
	public $sourcePath = '@bower/bootstrap-iconpicker';

	public $css=[];

	public $js= [];

	public $depends
		= [
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapPluginAsset',
		];



	public function init()
	{
		parent::init();

		$this->css[] = 'bootstrap-iconpicker/css/bootstrap-iconpicker' . (YII_DEBUG ? '' : '.min') . '.css';
		$this->js[] = 'bootstrap-iconpicker/js/bootstrap-iconpicker' . (YII_DEBUG ? '' : '.min') . '.js';

	}

	/**
	 * Helper for register iconset file
	**/
	protected function iconsetResolver($set)
	{
		$map = [
			'glyphicon'      => '',
			'fontawesome'    => '-4.3.0',
			'ionicon'        => '-1.5.2',
			'elusiveicon'    => '-2.0.0',
			'mapicon'        => '-2.1.0',
			'materialdesign' => '-1.1.1',
			'octicon'        => '-2.1.2',
			'typicon'        => '-2.0.6',
			'weathericon'    => '-1.2.0',
		];
		$tail =  ArrayHelper::getValue($map, $set, 'glyphicon');
		return 'bootstrap-iconpicker/js/iconset/iconset-' . $set. $tail .(YII_DEBUG ? '' : '.min').'.js';
	}
} 