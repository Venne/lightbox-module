<?php

/**
 * This file is part of the Venne:CMS (https://github.com/Venne)
 *
 * Copyright (c) 2011, 2012 Josef Kříž (http://www.josef-kriz.cz)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace LightboxModule\Listeners;

use AssetsModule\Managers\AssetManager;
use CmsModule\Content\Presenters\PagePresenter;
use CmsModule\Events\RenderArgs;
use CmsModule\Events\RenderEvents;
use Doctrine\Common\EventSubscriber;

/**
 * @author Josef Kříž <pepakriz@gmail.com>
 */
class AssetsListener implements EventSubscriber
{

	/** @var AssetManager */
	protected $assetManager;


	/**
	 * @param FileStorage $storage
	 */
	public function __construct(AssetManager $assetManager)
	{
		$this->assetManager = $assetManager;
	}


	/**
	 * Array of events.
	 *
	 * @return array
	 */
	public function getSubscribedEvents()
	{
		return array(RenderEvents::onHeadBegin);
	}


	public function onHeadBegin(RenderArgs $args)
	{
		if($args->getPresenter() instanceof PagePresenter) {
			$this->assetManager->addJavascript('@lightboxModule/fancybox/jquery.mousewheel-3.0.4.pack.js');
			$this->assetManager->addJavascript('@lightboxModule/fancybox/jquery.fancybox-1.3.4.pack.js');
			$this->assetManager->addJavascript('@lightboxModule/loader.js');
			$this->assetManager->addStylesheet('@lightboxModule/fancybox/jquery.fancybox-1.3.4.css');
		}
	}
}
