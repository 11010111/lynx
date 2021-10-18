<?php

defined('TYPO3_MODE') || die();

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

/*****************************
 * Add Backend configuration *
 ****************************/
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = [
    'backendFavicon' => 'fileadmin/lynx/icons/favicon.ico',
    'backendLogo' => 'fileadmin/lynx/images/logo_backend.png',
    'loginFootnote' => 'Smart Web Elements',
    'loginLogo' => 'fileadmin/lynx/images/logo.png',
    'loginLogoAlt' => 'Logo'

];