<?php
  defined('TYPO3_MODE') || die('Access denied.');

  call_user_func(function () {
      $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['brightsidegallery'] =  'mimetypes-x-content-brightsidegallery';
      $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['brightsideslide'] =  'mimetypes-x-content-brightsideslide';

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

    $GLOBALS['TCA']['tt_content']['columns']['bodytext'] = [
       'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.text',
       'config' => [
          'type' => 'text',
          'cols' => 48,
          'rows' => 4,
          'enableRichtext' => true,
      ]
    ];

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
            ],
        ],
    ];

    // Configure the default backend fields for the content element
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
    ');

    $GLOBALS['TCA']['tt_content']['palettes']['brightsidegallerySettings']['showitem'] = '
        tx_brightsidecontent_template,tx_brightsidecontent_cropratiothumb,
        image_zoom,tx_brightsidecontent_cropratiozoom,tx_brightsidecontent_showtitle,tx_brightsidecontent_showdesc,
    ';

    // Configure the default backend fields for the content element
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
    ');

    $GLOBALS['TCA']['tt_content']['palettes']['brightsideslideSettings']['showitem'] = '
        header,
        --linebreak--,bodytext,
        --linebreak--,tx_brightsidecontent_link,tx_brightsidecontent_linktext,
        --linebreak--,assets,
    ';

});
