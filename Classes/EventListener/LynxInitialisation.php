<?php

namespace Swe\Lynx\EventListener;

use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Resource\Exception\ExistingTargetFolderException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderWritePermissionsException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionDatabaseContentHasBeenImportedEvent;

/**
 * Class LynxInitialisation
 *
 * @package Swe\Lynx\EventListener
 */
class LynxInitialisation
{
    /**
     * @param AfterExtensionDatabaseContentHasBeenImportedEvent $event
     * @throws ExistingTargetFolderException
     * @throws InsufficientFolderAccessPermissionsException
     * @throws InsufficientFolderWritePermissionsException
     */
    public function __invoke(AfterExtensionDatabaseContentHasBeenImportedEvent $event)
    {
        if ($event->getPackageKey() === 'lynx') {
            /** @var ResourceFactory $resourceFactory */
            $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
            $storage = $resourceFactory->getStorageObject(1);

            if (!$storage->hasFolder('/Redakteur/')) {
                $storage->createFolder('/Redakteur/');
            }

            $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

            try {
                $maskConfiguration = $extensionConfiguration->get('mask');
                $maskConfiguration['json'] = 'EXT:lynx/Configuration/Mask/mask.json';
                $maskConfiguration['loader_identifier'] = "json";
                $maskConfiguration['content_elements_folder'] = "";
                $maskConfiguration['backend_layouts_folder'] = "";
                $maskConfiguration['backendlayout_pids'] = '0';
                $maskConfiguration['backend'] = 'EXT:lynx/Resources/Private/Mask/Backend/Templates';
                $maskConfiguration['layouts_backend'] = 'EXT:lynx/Resources/Private/Mask/Backend/Layouts';
                $maskConfiguration['partials_backend'] = 'EXT:lynx/Resources/Private/Mask/Backend/Partials';
                $maskConfiguration['content'] = 'EXT:lynx/Resources/Private/Mask/Frontend/Templates';
                $maskConfiguration['layouts'] = 'EXT:lynx/Resources/Private/Mask/Frontend/Layouts';
                $maskConfiguration['partials'] = 'EXT:lynx/Resources/Private/Mask/Frontend/Partials';
                $maskConfiguration['preview'] = 'EXT:lynx/Resources/Public/Mask/';
                $extensionConfiguration->set('mask', $maskConfiguration);
            } catch (ExtensionConfigurationExtensionNotConfiguredException|ExtensionConfigurationPathDoesNotExistException $e) {
                // Error
            }
        }
    }
}
