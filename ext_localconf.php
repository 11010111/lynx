<?php

// Using an alias of custom classes to prevent errors.
use Swe\Lynx\Hooks\BackendContentHook as SweLynxBackendContentHook;
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
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset_default'] = 'EXT:lynx/Configuration/RTE/Default.yaml';
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset'] = 'fileadmin/lynx/rte/Default.yaml';

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

        /******************
         * CE INFO - HOOK *
         ******************/
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawFooter'][] = SweLynxBackendContentHook::class;

        /*************************
         * FluidMail - Overrides *
         *************************/
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'EXT:lynx/Resources/Private/Templates/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['partialRootPaths'][700] = 'EXT:lynx/Resources/Private/Partials/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'EXT:lynx/Resources/Private/Layouts/Email';
    }
);
