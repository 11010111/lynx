<?php

// Using an alias of custom classes to prevent errors.
use Swe\Lynx\Hooks\BackendContentHook as SweLynxBackendContentHook;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder as Typo3QueryBuilder;
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

        /**********************************************
         * Add RTE configuration by Domain Model Data *
         **********************************************/
        try {
            /** @var Typo3QueryBuilder $registryQueryBuilder */
            $registryQueryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
                ->getQueryBuilderForTable('sys_registry');

            $registry = $registryQueryBuilder
                ->select('*')
                ->from('sys_registry')
                ->execute()
                ->fetchAll();

            foreach ($registry as $value) {
                if ($value['entry_key'] === 'typo3conf/ext/lynx/Initialisation/dataImported') {
                    /** @var Typo3QueryBuilder $queryBuilder */
                    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
                        ->getQueryBuilderForTable('tx_lynx_domain_model_preset');

                    $presets = $queryBuilder
                        ->select('preset')
                        ->from('tx_lynx_domain_model_preset')
                        ->execute()
                        ->fetchAll();

                    foreach ($presets as $key => $preset) {
                        if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset_' . $key])) {
                            $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx_preset_' . $key] = $preset['preset'];
                        }
                    }
                }
            }
        } catch (Exception $exception) {
            //
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
            'preview' => 'fileadmin/lynx/mask_project/Resources/Public/',
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

        /*******************************
         * Content Element Info - HOOK *
         *******************************/
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawFooter'][] = SweLynxBackendContentHook::class;

        /*************************
         * FluidMail - Overrides *
         *************************/
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Templates/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['partialRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Partials/Email';
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'fileadmin/lynx/ext/lynx/Layouts/Email';
    }
);
