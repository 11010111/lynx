<?php

defined('TYPO3') or die('Access denied.');

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
