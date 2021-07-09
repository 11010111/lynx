<?php

use Swe\Lynx\Hooks\BackendContentHook;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3_MODE') || die();

call_user_func(function() {

    /***************
     * Add default RTE configuration
     */
    if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset'])) {
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset'] = 'fileadmin/lynx/rte/Default.yaml';
    }

    $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask'] = [
        'backend' => 'fileadmin/lynx/ext/mask_project/Resources/Private/Mask/Backend/Templates/',
        'backendlayout_pids' => '0,1',
        'content' => 'fileadmin/lynx/ext/mask_project/Resources/Private/Mask/Frontend/Templates/',
        'json' => 'fileadmin/lynx/ext/mask_project/Configuration/Mask/mask.json',
        'layouts' => 'fileadmin/lynx/ext/mask_project/Resources/Private/Mask/Frontend/Layouts/',
        'layouts_backend' => 'fileadmin/lynx/ext/mask_project/Resources/Private/Mask/Backend/Layouts/',
        'partials' => 'fileadmin/lynx/ext/mask_project/Resources/Private/Mask/Frontend/Partials/',
        'partials_backend' => 'fileadmin/lynx/ext/mask_project/Resources/Private/Mask/Backend/Partials/',
        'preview' => 'fileadmin/lynx/ext/mask_project/Resources/Public/Mask/',
    ];

    /***************
     * register svg icons: identifier and filename
     */
    $iconRegistry = GeneralUtility::makeInstance(
        IconRegistry::class
    )->registerIcon(
        'grid-icon',
        BitmapIconProvider::class,
        ['source' => "EXT:lynx/Resources/Public/Icons/grid.svg"]
    );

    /***************
     * PageTS
     */
    ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:lynx/Configuration/TsConfig/Page/All.tsconfig">'
    );

    /***************
     * CE INFO - HOOK
     */
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawFooter'][] = BackendContentHook::class;

    /***************
     * FluidMail - Overrides
     */
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Templates/Email';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['partialRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Partials/Email';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Layouts/Email';
});
