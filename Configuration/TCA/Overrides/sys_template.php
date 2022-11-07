<?php

defined('TYPO3') or die('Access denied.');

call_user_func(function() {
    /**
     * Temporary variables
     */
    $extensionKey = 'lynx';

    /**
     * Default TypoScript for Lynx
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'Lynx'
    );
});
