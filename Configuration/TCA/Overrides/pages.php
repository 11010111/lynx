<?php

defined('TYPO3') or die('Access denied.');

call_user_func(function() {
    /**
     * Temporary variables
     */
    $extensionKey = 'lynx';

    /**
     * Default PageTS for Lynx
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/Lynx.tsconfig',
        'Lynx'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript/Headless',
        'Lynx Headless'
    );
});
