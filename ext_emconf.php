<?php
$EM_CONF[$_EXTKEY] = [
	'title' => 'Brightsidecontent',
	'description' => 'Content elements for gallery and slides',
	'category' => 'fe',
	'version' => '0.0.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Tanel Põld',
	'author_email' => 'tanel@brightside.ee',
	'author_company' => 'Brightside OÜ / t3brightside.com',
	'constraints' => [
		'depends' => [
			'typo3' => '9.5.0 - 9.5.99',
			'fluid_styled_content' => '',
		],
	],
];
