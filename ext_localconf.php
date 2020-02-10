<?php
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('@import "EXT:brightsidecontent/Configuration/PageTS/setup.typoscript"');

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	$iconRegistry->registerIcon(
		'mimetypes-x-content-brightsidegallery',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:brightsidecontent/Resources/Public/Images/Icons/mimetypes-x-content-brightsidegallery.svg']
	);
	$iconRegistry->registerIcon(
		'mimetypes-x-content-brightsideslide',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:brightsidecontent/Resources/Public/Images/Icons/mimetypes-x-content-brightsideslide.svg']
	);
	$iconRegistry->registerIcon(
		'mimetypes-x-content-brightsidecard',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:brightsidecontent/Resources/Public/Images/Icons/mimetypes-x-content-brightsidecard.svg']
	);
	$iconRegistry->registerIcon(
		'mimetypes-x-content-brightsidedownloads',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:brightsidecontent/Resources/Public/Images/Icons/mimetypes-x-content-brightsidedownloads.svg']
	);

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['brightsidegallery'] = \Brightside\Brightsidecontent\Hooks\PageLayoutView\ContentElementPreviewRenderer::class;
#	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['brightsideslide'] = \Brightside\Brightsidegallery\Hooks\PageLayoutView\ContentElementPreviewRenderer::class;
