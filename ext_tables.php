<?php

defined('TYPO3_MODE') || die();

/**
 * Backend CSS FILES
 */
$GLOBALS['TBE_STYLES']['skins']['lynx'] = [
    'name' => 'Backend Styles',
    'stylesheetDirectories' => [
        'css' => 'fileadmin/lynx/css/backend/'
    ]
];

/**
 * Development Mode CSS FILES
 */
if (!\TYPO3\CMS\Core\Core\Environment::getContext()->isProduction()) {
    $GLOBALS['TBE_STYLES']['skins']['lynx'] = [
        'name' => 'Development',
        'stylesheetDirectories' => [
            'css' => 'fileadmin/lynx/css/development/'
        ]
    ];
}
