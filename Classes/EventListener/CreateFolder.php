<?php

namespace Swe\Lynx\EventListener;

use TYPO3\CMS\Core\Resource\Exception\ExistingTargetFolderException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderWritePermissionsException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionStaticDatabaseContentHasBeenImportedEvent;

/**
 * Class CreateFolder
 *
 * @package Swe\Lynx\EventListener
 */
class CreateFolder
{
    /**
     * @param AfterExtensionStaticDatabaseContentHasBeenImportedEvent $event
     * @throws ExistingTargetFolderException
     * @throws InsufficientFolderAccessPermissionsException
     * @throws InsufficientFolderWritePermissionsException
     */
    public function __invoke(AfterExtensionStaticDatabaseContentHasBeenImportedEvent $event)
    {
        if ($event->getPackageKey() == 'lynx') {
            /** @var ResourceFactory $resourceFactory */
            $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
            $storage = $resourceFactory->getStorageObject(1);

            if (!$storage->hasFolder('/Dokumente/')) {
                $storage->createFolder('/Dokumente/');
            }

            if (!$storage->hasFolder('/Uploads/Images/')) {
                $storage->createFolder('/Uploads/Images/');
            }
        }
    }
}
