<?php

namespace insolita\iconpicker;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * widget for http://victor-valencia.github.io/bootstrap-iconpicker/
 */
class Iconpicker extends InputWidget
{
	/**
	 * @var string $iconset - one of allowed variants
	 * glyphicon|ionicon|fontawesome|weathericon|mapicon|octicon|typicon|elusiveicon|materialdesign
	 */
	public $iconset = 'glyphicon';
	/**
	 * @var array $pickerOptions additional html options for picker button
	 */
	public $pickerOptions = ['class' => 'btn btn-default btn-sm'];

	/**
	 * @var array $containerOptions additional html options for container
	 */
	public $containerOptions = [];

	/**
	 * @var array $clientOptions - iconpicker options
	 * (will be merged with defaultOptions @see getDefaultOptions() , so you can set only overrides)
	 * @see       http://victor-valencia.github.io/bootstrap-iconpicker/
	 **/
	public $clientOptions
		= [
			'rows'            => 5,
			'columns'         => 10,
			'placement'       => 'right',
			'align'           => 'center',
			'arrowClass'      => 'btn-primary',
			'header'          => true,
			'footer'          => true,
			'labelHeader'     => '{0} / {1}',
			'labelFooter'     => '{0} - {1}:[{2}]',
			'search'          => true,
			'searchText'      => 'Search icon',
			'selectedClass'   => 'btn-warning',
			'unselectedClass' => 'btn-default',
		];

	/**
	 * @var JsExpression $onSelectIconCallback
	 * @example
	 * onSelectIconCallback=>new JsExpression('function(e){
	 *    var icon = e.icon;
	 *    icon = "some "+icon;
	 *    $('#target').val(icon);
	 * }'),
	 */
	public $onSelectIconCallback;


	/**
	 * @var
	 */
	private $_id;
	/**
	 * @var string
	 */
	private $_default = 'fa-ellipsis-h';

	/**
	 *
	 */
	public function init()
	{
		$this->registerTranslations();
		if (!isset($this->options['id']) && !$this->hasModel())
		{
			$this->options['id'] = 'iconpicker_' . $this->getId();
		}
		parent::init();
		$this->_id = $this->options['id'];
		if ($this->hasModel() && !empty($this->model->{$this->attribute}))
		{
			$this->_default = $this->pickerOptions['data-icon'] = $this->model->{$this->attribute};
		}
		if (!$this->hasModel() && !empty($this->value))
		{
			$this->_default = $this->pickerOptions['data-icon'] = $this->value;
		}
		if (!isset($this->pickerOptions['id']))
		{
			$this->pickerOptions['id'] = $this->_id . '_jspicker';
		}
		$this->clientOptions = ArrayHelper::merge($this->getDefaultOptions(), $this->clientOptions);
		$this->registerAssets();
	}

	/**
	 * Register widget translations.
	 */
	public function registerTranslations()
	{
		if (!isset(\Yii::$app->i18n->translations['insolita/iconpicker'])
			&& !isset
			(\Yii::$app->i18n->translations['insolita/iconpicker/*'])
		)
		{
			\Yii::$app->i18n->translations['insolita/iconpicker'] = [
				'class'            => 'yii\i18n\PhpMessageSource',
				'basePath'         => '@insolita/iconpicker/messages',
				'forceTranslation' => true,
				'fileMap'          => [
					'insolita/iconpicker' => 'iconpicker.php',
				],
			];
		}
	}

	/**
	 * Default js-plugin options
	 *
	 * @return array
	 **/
	protected function getDefaultOptions()
	{
		return [
			'iconset'         => $this->iconset,
			'rows'            => 5,
			'columns'         => 10,
			'placement'       => 'right',
			'align'           => 'center',
			'arrowClass'      => 'btn-primary',
			'header'          => true,
			'footer'          => true,
			'labelHeader'     => '{0} / {1}',
			'labelFooter'     => '{0} - {1}:[{2}]',
			'search'          => true,
			'searchText'      => \Yii::t('insolita/iconpicker', 'SEARCH_ICON'),
			'selectedClass'   => 'btn-warning',
			'unselectedClass' => 'btn-default',
		];
	}

	/**
	 * Registers the needed assets
	 */
	public function registerAssets()
	{
		$view = $this->getView();
		$targetId = $this->_id;
		$iconPickerId = $this->pickerOptions['id'];
		$assetClass = 'insolita\\iconpicker\\assets\\'.ucfirst($this->iconset).'Iconset';
		$view->registerAssetBundle($assetClass);
		$this->clientOptions = ArrayHelper::merge($this->clientOptions, [
			'icon' => $this->_default,
		]);
		$this->clientOptions = Json::encode($this->clientOptions);
		$js[]
			= <<<JS
           $("#{$iconPickerId}").iconpicker({$this->clientOptions});
JS;
		$callback = null;
		if (!empty($this->onSelectIconCallback))
		{
			$callback = $this->onSelectIconCallback instanceof JsExpression
				? $this->onSelectIconCallback->__toString()
				: $this->onSelectIconCallback;
		}
		$js[] = ($callback)
			? <<<JS
           $("#{$iconPickerId}").on('change', function(e) {
                var callback = {$callback};
                callback(e);
            });
JS
			:
			<<<JS
            $("#{$iconPickerId}").on('change', function(e) {
                $('#$targetId').val(e.icon);
            });
JS;

		$view->registerJs(implode("\n", $js));
	}

	/**
	 * @return string bootstrap-picker button with hiddenInput field where we put selected value
	 */
	public function run()
	{

		if ($this->hasModel())
		{
			$inp = Html::activeHiddenInput($this->model, $this->attribute, $this->options);
		}
		else
		{
			$inp = Html::hiddenInput($this->name, $this->value, $this->options);
		}
		$picker = Html::button(\Yii::t('insolita/iconpicker', 'CHOOSE_ICON'), $this->pickerOptions);

		return Html::tag('div', $picker . $inp, $this->containerOptions);
	}
}
