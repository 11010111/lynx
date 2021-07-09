<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die();

call_user_func(function ()
{
    ExtensionManagementUtility::addTCAcolumns(
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
            'display_on' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:lynx/Resources/Private/Language/locallang_be.xlf:frame.display_on',
                'description' => '',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Default', ''],
                    ]
                ]
            ]
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        'display_on, frame_class_extra, space_left_class, space_right_class',
        'appearance',
        'after:space_after_class'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'frames',
        '--linebreak--, display_on, frame_class_extra, space_left_class, space_right_class'
    );

});
