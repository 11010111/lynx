<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die();

call_user_func(
    function () {
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c100',
                '100%',
                '1 Column Container',
                [
                    [
                        ['name' => '100%', 'colspan' => 1, 'colPos' => 201]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c50-50',
                '50% - 50%',
                '2 Columns Container',
                [
                    [
                        ['name' => '50%', 'colspan' => 1, 'colPos' => 201],
                        ['name' => '50%', 'colspan' => 1, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c25-75',
                '25% - 75%',
                '2 Columns Container',
                [
                    [
                        ['name' => '25%', 'colspan' => 3, 'colPos' => 201],
                        ['name' => '75%', 'colspan' => 7, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c75-25',
                '75% - 25%',
                '2 Columns Container',
                [
                    [
                        ['name' => '75%', 'colspan' => 7, 'colPos' => 201],
                        ['name' => '25%', 'colspan' => 3, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c33-66',
                '33% - 66%',
                '2 Columns Container',
                [
                    [
                        ['name' => '33%', 'colspan' => 3, 'colPos' => 201],
                        ['name' => '66%', 'colspan' => 6, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c66-33',
                '66% - 33%',
                '2 Columns Container',
                [
                    [
                        ['name' => '66%', 'colspan' => 6, 'colPos' => 201],
                        ['name' => '33%', 'colspan' => 3, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c33-33-33',
                '33% - 33% - 33%',
                '3 Columns Container',
                [
                    [
                        ['name' => '33%', 'colspan' => 1, 'colPos' => 201],
                        ['name' => '33%', 'colspan' => 1, 'colPos' => 202],
                        ['name' => '33%', 'colspan' => 1, 'colPos' => 203]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c25-25-25-25',
                '25% - 25% - 25% -25%',
                '4 Columns Container',
                [
                    [
                        ['name' => '25%', 'colspan' => 1, 'colPos' => 201],
                        ['name' => '25%', 'colspan' => 1, 'colPos' => 202],
                        ['name' => '25%', 'colspan' => 1, 'colPos' => 203],
                        ['name' => '25%', 'colspan' => 1, 'colPos' => 204]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c20-80',
                '20% - 80%',
                '2 Columns Container',
                [
                    [
                        ['name' => '20%', 'colspan' => 2, 'colPos' => 201],
                        ['name' => '80%', 'colspan' => 8, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'c80-20',
                '80% - 20%',
                '2 Columns Container',
                [
                    [
                        ['name' => '80%', 'colspan' => 8, 'colPos' => 201],
                        ['name' => '20%', 'colspan' => 2, 'colPos' => 202]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'accordion',
                'Accordion',
                '1 Column Accordion Container',
                [
                    [
                        ['name' => '100%', 'colspan' => 1, 'colPos' => 201]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'slider',
                'Slider',
                '1 Column Slider Container',
                [
                    [
                        ['name' => '100%', 'colspan' => 1, 'colPos' => 201]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \B13\Container\Tca\Registry::class)->configureContainer(
            new \B13\Container\Tca\ContainerConfiguration(
                'slider-cell',
                'Slider-Cell',
                '1 Column Slider-Cell Container',
                [
                    [
                        ['name' => '100%', 'colspan' => 1, 'colPos' => 201]
                    ]
                ]
            )
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tt_content',
            [
                'container' => [
                    'exclude' => 1,
                    'onChange' => 'reload',
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:container',
                    'description' => '',
                    'config' => [
                        'type' => 'select',
                        'renderType' => 'selectSingle',
                        'items' => [
                            ['Excess Width', ''],
                            ['Content Width', 'content'],
                            ['Full Width', 'full'],
                            ['Full Width (padding)', 'full-padding']
                        ]
                    ]
                ],
                'breakpoint' => [
                    'exclude' => 1,
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:breakpoint',
                    'description' => '',
                    'config' => [
                        'type' => 'select',
                        'renderType' => 'selectSingle'
                    ]
                ],
                'alignment' => [
                    'exclude' => 1,
                    'onChange' => 'reload',
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:alignment',
                    'description' => '',
                    'config' => [
                        'type' => 'select',
                        'renderType' => 'selectSingle',
                        'items' => [
                            ['Default', ''],
                            ['Left', 'left'],
                            ['Right', 'right']
                        ]
                    ],
                    'displayCond' => [
                        'AND' => [
                            'FIELD:container:=:content'
                        ]
                    ]
                ],
                'padding_top' => [
                    'exclude' => 1,
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:padding_top',
                    'description' => '',
                    'config' => [
                        'type' => 'select',
                        'renderType' => 'selectSingle',
                        'items' => [
                            ['Default', '']
                        ]
                    ]
                ],
                'padding_bottom' => [
                    'exclude' => 1,
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:padding_bottom',
                    'description' => '',
                    'config' => [
                        'type' => 'select',
                        'renderType' => 'selectSingle',
                        'items' => [
                            ['Default', '']
                        ]
                    ]
                ],
                'background_color' => [
                    'exclude' => 1,
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:background_color',
                    'description' => '',
                    'config' => [
                        'type' => 'input',
                        'renderType' => 'colorpicker',
                        'size' => 10,
                    ]
                ],
                'foreground_color' => [
                    'exclude' => 1,
                    'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:foreground_color',
                    'description' => '',
                    'config' => [
                        'type' => 'input',
                        'renderType' => 'colorpicker',
                        'size' => 10,
                    ]
                ]
            ]
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'tt_content',
            'container, breakpoint, alignment, padding_top, padding_bottom, background_color, foreground_color',
            'appearance',
            'after:space_after_class'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'tt_content',
            'frames',
            'container, --linebreak--, breakpoint, alignment, --linebreak--, padding_top, padding_bottom, --linebreak--, background_color, foreground_color'
        );

        $GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets'] = [
            'config' => [
                'maxitems' => 1,
            ],
        ];
    }
);
