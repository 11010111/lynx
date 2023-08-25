<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die('Access denied.');

/*********************************
 * Add default RTE configuration *
 *********************************/
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['lynx'] = 'EXT:lynx/Configuration/RTE/Default.yaml';

/**********
 * PageTS *
 **********/
ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:lynx/Configuration/TsConfig/Page/All.tsconfig">'
);

ExtensionManagementUtility::addPageTSConfig(
    'mod.wizards.newContentElement.wizardItems.common.elements.textmedia {
        title = Media
        description = Text, Image, Video, Audio
    }'
);

/*****************************
 * Add global lynx namespace *
 *****************************/
$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['lynx'] = ['Swe\\Lynx\\ViewHelpers'];

/*************************
 * FluidMail - Overrides *
 *************************/
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'EXT:lynx/Resources/Private/Templates/Email/';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['partialRootPaths'][700] = 'EXT:lynx/Resources/Private/Partials/Email/';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700] = 'EXT:lynx/Resources/Private/Layouts/Email/';
