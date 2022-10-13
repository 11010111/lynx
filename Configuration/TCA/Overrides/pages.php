<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die('Access denied.');

call_user_func(
    function () {
        /**
         * Temporary variables
         */
        $extensionKey = 'lynx';

        /**
         * Default PageTS for Lynx
         */
        ExtensionManagementUtility::registerPageTSConfigFile(
            $extensionKey,
            'Configuration/TsConfig/Page/Lynx.tsconfig',
            'Lynx'
        );
    }
);
