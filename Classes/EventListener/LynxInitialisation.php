<?php

namespace Swe\Lynx\EventListener;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Resource\Exception\ExistingTargetFolderException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderWritePermissionsException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionFilesHaveBeenImportedEvent;

/**
 * Class LynxInitialisation
 *
 * @package Swe\Lynx\EventListener
 */
class LynxInitialisation extends ResourceFactory
{
    /** @var ResourceFactory */
    protected ResourceFactory $resourceFactory;

    /**
     * @param ResourceFactory $resourceFactory
     * @return void
     */
    public function injectResourceFactory(ResourceFactory $resourceFactory)
    {
        $this->resourceFactory = $resourceFactory;
    }

    /**
     * @param AfterExtensionFilesHaveBeenImportedEvent $event
     * @throws ExistingTargetFolderException
     * @throws InsufficientFolderAccessPermissionsException
     * @throws InsufficientFolderWritePermissionsException
     */
    public function __invoke(AfterExtensionFilesHaveBeenImportedEvent $event)
    {
        if ($event->getPackageKey() === 'lynx') {
            $storage = $this->resourceFactory->getStorageObject(1);

            if (!$storage->hasFolder('/Redakteur/')) {
                $storage->createFolder('/Redakteur/');
                $this->writeFileMount('Redakteur', '/Redakteur/');
            }
        }
    }

    /**
     * Search and write file mount if not exists.
     *
     * @param string $title
     * @param string $mountPath
     */
    public function writeFileMount(string $title, string $mountPath): void
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('sys_filemounts');

        $statement = $queryBuilder
            ->count('uid')
            ->from('sys_filemounts')
            ->where(
                $queryBuilder->expr()->eq('title', $queryBuilder->createNamedParameter($title))
            )
            ->execute()
            ->fetchColumn(0);

        if ($statement > 0) {
            return;
        }

        $queryBuilder->insert('sys_filemounts')
            ->values(
                [
                    'title' => $title,
                    'path' => $mountPath,
                    'base' => 1,
                    'read_only' => 0,
                ]
            )
            ->execute();
    }

}
