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

        /**************************
         * Add Mask configuration *
         **************************/
        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask'] = [
            'backend' => 'fileadmin/lynx/mask_project/Resources/Private/Backend/Templates/',
            'backendlayout_pids' => '0,1',
            'content' => 'fileadmin/lynx/mask_project/Resources/Private/Frontend/Templates/',
            'json' => 'fileadmin/lynx/mask_project/Configuration/mask.json',
            'layouts' => 'fileadmin/lynx/mask_project/Resources/Private/Frontend/Layouts/',
            'layouts_backend' => 'fileadmin/lynx/mask_project/Resources/Private/Backend/Layouts/',
            'partials' => 'fileadmin/lynx/mask_project/Resources/Private/Frontend/Partials/',
            'partials_backend' => 'fileadmin/lynx/mask_project/Resources/Private/Backend/Partials/',
            'preview' => 'fileadmin/lynx/mask_project/Resources/Public/'
        ];

        /*****************************
         * Add Backend configuration *
         ****************************/
        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = [
            'backendFavicon' => 'fileadmin/lynx/icons/favicon.ico',
            'backendLogo' => 'fileadmin/lynx/images/logo_backend.png',
            'loginBackgroundImage' => '',
            'loginFootnote' => '',
            'loginHighlightColor' => '#0630D1',
            'loginLogo' => 'fileadmin/lynx/images/logo.png',
            'loginLogoAlt' => 'Smart Web Elements'

        ];

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

        ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:lynx/Configuration/TsConfig/Page/Mod/Wizards/TextMedia.tsconfig">'
        );

        /*************************
         * FluidMail - Overrides *
         *************************/
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Templates/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['partialRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Partials/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Layouts/Email';
    }
);
