<?php

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3_MODE') || die();

call_user_func(
    function () {
        /*********************************
         * Add default RTE configuration *
         *********************************/
        if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset'])) {
            $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset'] = 'fileadmin/lynx/rte/Default.yaml';
        }

        /*****************************
         * Add global lynx namespace *
         *****************************/
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['lynx'] = ['Swe\\Lynx\\ViewHelpers'];

        /***********************************************
         * register svg icons: identifier and filename *
         ***********************************************/
        /** @var IconRegistry $iconRegistry */
        $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
        $iconRegistry->registerIcon(
            'grid-icon',
            BitmapIconProvider::class,
            ['source' => "EXT:lynx/Resources/Public/Icons/grid.svg"]
        );

        /**********
         * PageTS *
         **********/
        ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:lynx/Configuration/TsConfig/Page/All.tsconfig">'
        );

        /*************************
         * FluidMail - Overrides *
         *************************/
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Templates/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['partialRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Partials/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Layouts/Email';
    }
);
