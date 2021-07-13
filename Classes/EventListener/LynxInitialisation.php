<?php

namespace Swe\Lynx\EventListener;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\Exception\ExistingTargetFolderException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderWritePermissionsException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionStaticDatabaseContentHasBeenImportedEvent;

/**
 * Class LynxInitialisation
 *
 * @package Swe\Lynx\EventListener
 */
class LynxInitialisation
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
                $this->writeFileMount('Dokumente', '/Dokumente/');
            }

            if (!$storage->hasFolder('/Uploads/Images/')) {
                $storage->createFolder('/Uploads/Images/');
                $this->writeFileMount('Bilder', '/Uploads/Images/');
            }
        }
    }

    /**
     * Search and write filemount if not exists
     * @param $title
     * @param $mountPath
     */
    public function writeFileMount($title, $mountPath) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('sys_filemounts');
        $count = $queryBuilder
            ->count('uid')
            ->from('sys_filemounts')
            ->where(
                $queryBuilder->expr()->eq('title', $queryBuilder->createNamedParameter($title))
            )->execute()->fetchAll();

        if ($count < 1) {
            $queryBuilder->insert('sys_filemounts')->values(
                [
                    'title' => $title,
                    'path' => $mountPath,
                    'base' => 1,
                    'read_only' => 0
                ]
            )->execute();
        }
    }

}
