<?php
/**
 * Created by solly [18.05.16 5:57]
 */

namespace insolita\iconpicker\assets;


class OcticonIconset extends IconpickerAsset
{
	public function init()
	{
		$this->js[] = $this->iconsetResolver('octicon');
		parent::init();

	}
}