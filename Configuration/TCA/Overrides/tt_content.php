<?php
defined('TYPO3_MODE') || die();

call_user_func(function ()
{
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        [
            'frame_class_extra' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:frame.extra',
                'description' => '',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Default', ''],
                    ]
                ]
            ],
            'space_left_class' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:frame.left',
                'description' => '',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Default', ''],
                    ]
                ]
            ],
            'space_right_class' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:frame.right',
                'description' => '',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Default', ''],
                    ]
                ]
            ],
            'no_mobile' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:frame.no_mobile',
                'description' => '',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0,
                    'items' => [
                        [
                            0 => '',
                            1 => ''
                        ]
                    ]
                ]
            ]
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        'frame_class_extra, space_left_class, space_right_class, no_mobile',
        'appearance',
        'after:space_after_class'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'frames',
        '--linebreak--, frame_class_extra, space_left_class, space_right_class, no_mobile'
    );

});
