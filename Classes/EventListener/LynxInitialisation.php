<?php

namespace Swe\Lynx\EventListener;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionFilesHaveBeenImportedEvent;

/**
 * Class LynxInitialisation
 *
 * @package Swe\Lynx\EventListener
 */
class LynxInitialisation
{
    /**
     * @param AfterExtensionFilesHaveBeenImportedEvent $event
     * @throws \TYPO3\CMS\Core\Resource\Exception\ExistingTargetFolderException
     * @throws \TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException
     * @throws \TYPO3\CMS\Core\Resource\Exception\InsufficientFolderWritePermissionsException
     */
    public function __invoke(AfterExtensionFilesHaveBeenImportedEvent $event)
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
        $statement = $queryBuilder
            ->select('*')
            ->from('sys_filemounts')
            ->where(
                $queryBuilder->expr()->eq('title', $queryBuilder->createNamedParameter($title))
            )->execute()->fetchAll();

        if (count($statement) < 1) {
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
