<?php
  defined('TYPO3_MODE') || die('Access denied.');

  call_user_func(function () {
      $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['brightsidegallery'] =  'mimetypes-x-content-brightsidegallery';
      $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['brightsideslide'] =  'mimetypes-x-content-brightsideslide';
      $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['brightsidecard'] =  'mimetypes-x-content-brightsidecard';
      $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['brightsidedownloads'] =  'mimetypes-x-content-brightsidedownloads';

      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
      "tt_content",
      "CType",
      [
        "Gallery",
        "brightsidegallery",
        "mimetypes-x-content-brightsidegallery"
      ],
      'textmedia',
      'after'
      );

      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
      "tt_content",
      "CType",
      [
        "Slide",
        "brightsideslide",
        "mimetypes-x-content-brightsideslide"
      ],
      'brightsidegallery',
      'after'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    "tt_content",
    "CType",
    [
      "Card",
      "brightsidecard",
      "mimetypes-x-content-brightsidecard"
    ],
    'brightsideslide',
    'after'
  );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    "tt_content",
    "CType",
    [
      "Downloads",
      "brightsidedownloads",
      "mimetypes-x-content-brightsidedownloads"
    ],
    'brightsidecard',
    'after'
  );

  $bgImagePlacement = [
  	'tx_brightsidecontent_bgplacement' => [
  	    'exclude' => 1,
  	    'label' => 'Image Placement on Screen Resize',
  	    'config' => [
  	    	'type' => 'select',
  			'renderType' => 'selectSingle',
  			'items' => [
  				['Top center', 'center top'],
  				['Top  left', 'left top'],
  				['Top right', 'right top'],
  				['Center center', 'center center'],
  				['Center left', 'left center'],
  				['Center right', 'right center'],
  				['Bottom center', 'center bottom'],
  				['Bottom left', 'left bottom'],
  				['Bottom right', 'right bottom'],
  			],
      	],
    ],
  ];
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_reference',$bgImagePlacement,1);

    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_template'] = [
        'exclude' => 1,
        'label'   => 'Template',
        'config'  => array(
            'type'     => 'select',
            'renderType' => 'selectSingle',
            'default' => 0,
            'items'    => array(), /* items set in page TsConfig */
        ),
    ];

    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_cropratiothumb'] = [
        'exclude' => 1,
        'label'   => 'Thumbnail crop',
        'config'  => array(
            'type'     => 'select',
            'renderType' => 'selectSingle',
            'default' => 'default',
            'items'    => array(), /* items set in page TsConfig */
        ),
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_cropratiozoom'] = [
        'exclude' => 1,
        'label'   => 'Click-enlarge crop',
        'config'  => array(
            'type'     => 'select',
            'renderType' => 'selectSingle',
            'default' => 'default',
            'items'    => array(), /* items set in page TsConfig */
        ),
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_showtitle'] = [
        'exclude' => 1,
        'label' => 'Show titles',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
        ]
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_showdesc'] = [
        'exclude' => 1,
        'label' => 'Show descriptions',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
        ]
    ];

    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_link'] = [
        'exclude' => true,
        'label' => 'Slide link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'size' => 50,
            'max' => 1024,
            'eval' => 'trim',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                    ],
                ],
            ],
            'softref' => 'typolink'
        ],
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_brightsidecontent_linktext'] = [
        'l10n_mode' => 'prefixLangTitle',
        'exclude' => '1',
        'label' => 'Link text (overrides default)',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
        ],
    ];
/*
    $GLOBALS['TCA']['tt_content']['columns']['assets']['config']['overrideChildTca']['columns']['crop'] = [
        'config' => [
            'cropVariants' => [
                'default' => [
                    'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.crop_variant.default',
                    'allowedAspectRatios' => [
                        '16:9' => [
                            'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
                            'value' => 16 / 9
                        ],
                        '3:2' => [
                            'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.3_2',
                            'value' => 3 / 2
                        ],
                        '4:3' => [
                            'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
                            'value' => 4 / 3
                        ],
                        '1:1' => [
                            'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
                            'value' => 1.0
                        ],
                        'NaN' => [
                            'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                            'value' => 0.0
                        ],
                    ],
                    'selectedRatio' => 'NaN',
                    'cropArea' => [
                        'x' => 0.0,
                        'y' => 0.0,
                        'width' => 1.0,
                        'height' => 1.0,
                    ],
                ],
                'landscape' => [
                    'title' => 'Landscape',
                    'selectedRatio' => '5:3',
                    'allowedAspectRatios' => [
                        '5:3' => [
                            'title' => 'Landscape',
                            'value' => 5 / 3,
                        ],
                    ],
                ],
                'square' => [
                    'title' => 'Square',
                    'selectedRatio' => '1:1',
                    'allowedAspectRatios' => [
                        '1:1' => [
                            'title' => 'Square',
                            'value' => 1 / 1,
                        ],
                    ],
                ],
                'portrait' => [
                    'title' => 'Portrait',
                    'selectedRatio' => '3:4',
                    'allowedAspectRatios' => [
                        '3:4' => [
                            'title' => 'Portrait',
                            'value' => 3 / 4,
                        ],
                    ],
                ],
                'tower' => [
                    'title' => 'Tower',
                    'selectedRatio' => '9:16',
                    'allowedAspectRatios' => [
                        '9:16' => [
                            'title' => 'Tower',
                            'value' => 9 / 16,
                        ],
                    ],
                ],
                'slide' => [
                    'title' => 'Slide',
                    'selectedRatio' => '190:77',
                    'allowedAspectRatios' => [
                        '190:77' => [
                            'title' => 'Slide',
                            'value' => 190 / 77,
                        ],
                    ],
                ],
            ],
        ],
    ];
*/
    // Configure the default backend fields for the gallery content element
    $GLOBALS['TCA']['tt_content']['types']['brightsidegallery'] = array(
       'showitem' => '
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,
             --palette--;Settings;brightsidegallerySettings,assets,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.menu_accessibility;menu_accessibility,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
               --palette--;;language,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
               categories,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
               rowDescription,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
             --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
    ',
    'columnsOverrides' => [
        'assets' => [
            'exclude' => 1,
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'assets',
                [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    // custom configuration for displaying fields in the overlay/reference table
                    // to use the image overlay palette instead of the basic overlay palette
                    'overrideChildTca' => [
                        'columns' => [
                            'crop' => [
                            'config' => [
                                'cropVariants' => [

                                    'default' => [
                                        'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.crop_variant.default',
                                        'allowedAspectRatios' => [
                                            '16:9' => [
                                                'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
                                                'value' => 16 / 9
                                            ],
                                            '3:2' => [
                                                'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.3_2',
                                                'value' => 3 / 2
                                            ],
                                            '4:3' => [
                                                'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
                                                'value' => 4 / 3
                                            ],
                                            '1:1' => [
                                                'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
                                                'value' => 1.0
                                            ],
                                            'NaN' => [
                                                'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                                                'value' => 0.0
                                            ],
                                        ],
                                        'selectedRatio' => 'NaN',
                                        'cropArea' => [
                                            'x' => 0.0,
                                            'y' => 0.0,
                                            'width' => 1.0,
                                            'height' => 1.0,
                                        ],
                                    ],
                                    'landscape' => [
                                        'title' => 'Landscape',
                                        'selectedRatio' => '5:3',
                                        'allowedAspectRatios' => [
                                            '5:3' => [
                                                'title' => 'Landscape',
                                                'value' => 5 / 3,
                                            ],
                                        ],
                                    ],
                                    'square' => [
                                        'title' => 'Square',
                                        'selectedRatio' => '1:1',
                                        'allowedAspectRatios' => [
                                            '1:1' => [
                                                'title' => 'Square',
                                                'value' => 1 / 1,
                                            ],
                                        ],
                                    ],
                                    'portrait' => [
                                        'title' => 'Portrait',
                                        'selectedRatio' => '3:4',
                                        'allowedAspectRatios' => [
                                            '3:4' => [
                                                'title' => 'Portrait',
                                                'value' => 3 / 4,
                                            ],
                                        ],
                                    ],
                                    'tower' => [
                                        'title' => 'Tower',
                                        'selectedRatio' => '9:16',
                                        'allowedAspectRatios' => [
                                            '9:16' => [
                                                'title' => 'Tower',
                                                'value' => 9 / 16,
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],

                    ],
                ],
                'jpg,png'
            ),
            ],
        ]);

    $GLOBALS['TCA']['tt_content']['palettes']['brightsidegallerySettings']['showitem'] = '
        tx_brightsidecontent_template,tx_brightsidecontent_cropratiothumb,
        image_zoom,tx_brightsidecontent_cropratiozoom,tx_brightsidecontent_showtitle,tx_brightsidecontent_showdesc,
    ';

    // Configure the default backend fields for the slide content element
    $GLOBALS['TCA']['tt_content']['types']['brightsideslide'] = array(
       'showitem' => '
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
             --palette--;Content;brightsideslideSettings,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.menu_accessibility;menu_accessibility,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
               --palette--;;language,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
               categories,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
               rowDescription,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
             --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
        ',
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'enableRichtext' => true,
                    'richtextConfiguration' => 'default'
                ]
            ],
      		'assets' => [
      			'label' => 'Page Image (header, page lists, etc)',
      			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
      				'assets',
     [
      					'behaviour' => [
      						'allowLanguageSynchronization' => true,
      					],
      					// custom configuration for displaying fields in the overlay/reference table
      					// to use the image overlay palette instead of the basic overlay palette
      					'overrideChildTca' => [
      						'types' => [
      							'0' => [
      								'showitem' => '
      									--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
      									--palette--;;filePalette'
      							],
      							\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
      								'showitem' => '
      									tx_brightsidecontent_bgplacement,crop,
      			            			--palette--;;filePalette'
      							],
      						],
                            'columns' => [
                                'crop' => [
                                'config' => [
                                    'cropVariants' => [

                                        'slide' => [
                                            'title' => 'Slide',
                                            'selectedRatio' => '190:77',
                                            'allowedAspectRatios' => [
                                                '190:77' => [
                                                    'title' => 'Slide',
                                                    'value' => 190 / 77,
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                      	],

      					],
      				],
      				'jpg,png'
      			),
            ],
        ]);

    $GLOBALS['TCA']['tt_content']['palettes']['brightsideslideSettings']['showitem'] = '
        header,
        --linebreak--,subheader,
        --linebreak--,bodytext,
        --linebreak--,tx_brightsidecontent_link,tx_brightsidecontent_linktext,
        --linebreak--,assetssetup,assets,
    ';

    // Configure the default backend fields for the slide content element
    $GLOBALS['TCA']['tt_content']['types']['brightsidecard'] = array(
       'showitem' => '
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
             --palette--;Content;brightsidecardSettings,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.menu_accessibility;menu_accessibility,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
               --palette--;;language,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
               categories,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
               rowDescription,
             --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
             --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ]
        ],
        'assets' => [
            'label' => 'Card Image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'assets',
 [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    // custom configuration for displaying fields in the overlay/reference table
                    // to use the image overlay palette instead of the basic overlay palette
                    'overrideChildTca' => [
                        'columns' => [
                            'crop' => [
                            'config' => [
                                'cropVariants' => [

                                    'slide' => [
                                        'title' => 'Card',
                                        'selectedRatio' => '720:400',
                                        'allowedAspectRatios' => [
                                            '720:400' => [
                                                'title' => 'Card',
                                                'value' => 720 / 400,
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],

                    ],
                ],
                'jpg,png'
            ),
        ],
    ]);

    $GLOBALS['TCA']['tt_content']['palettes']['brightsidecardSettings']['showitem'] = '
        header,
        --linebreak--,subheader,
        --linebreak--,bodytext,
        --linebreak--,tx_brightsidecontent_template,
        --linebreak--,assets,
        --linebreak--,imageorient,
    ';

    // Configure the default backend fields for the downloads content element
    $GLOBALS['TCA']['tt_content']['types']['brightsidedownloads'] = array(
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,
                --palette--;;brightsidedownloadsSettings,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        ');

    $GLOBALS['TCA']['tt_content']['palettes']['brightsidedownloadsSettings']['showitem'] = '
        --linebreak--,tx_brightsidecontent_template,
        --linebreak--,media,
        --linebreak--,
    ';

});
