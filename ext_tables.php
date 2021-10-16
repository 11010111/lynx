<?php

defined('TYPO3_MODE') || die();

if (\TYPO3\CMS\Core\Core\Environment::getContext()->isProduction()) {
    $GLOBALS['TBE_STYLES']['skins']['lynx'] = [
        'name' => 'Development',
        'stylesheetDirectories' => [
            'css' => 'fileadmin/lynx/css/development.css'
        ]
    ];
}
