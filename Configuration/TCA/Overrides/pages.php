<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die();

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
            'Configuration/TsConfig/Page/All.tsconfig',
            'Lynx'
        );
    }
);
