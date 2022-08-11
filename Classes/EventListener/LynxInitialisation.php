<?php

namespace Swe\Lynx\EventListener;

use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
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
class LynxInitialisation
{
    /**
     * @param AfterExtensionFilesHaveBeenImportedEvent $event
     * @throws ExistingTargetFolderException
     * @throws InsufficientFolderAccessPermissionsException
     * @throws InsufficientFolderWritePermissionsException
     */
    public function __invoke(AfterExtensionFilesHaveBeenImportedEvent $event)
    {
        if ($event->getPackageKey() === 'lynx') {
            /** @var ResourceFactory $resourceFactory */
            $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
            $storage = $resourceFactory->getStorageObject(1);

            if (!$storage->hasFolder('/Redakteur/')) {
                $storage->createFolder('/Redakteur/');
                $this->writeFileMount('Redakteur', '/Redakteur/');
            }

            $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

            try {
                $maskConfiguration = $extensionConfiguration->get('mask');
                $maskConfiguration['json'] = "fileadmin/lynx/mask_project/Configuration/Mask/mask.json";
                $maskConfiguration['loader_identifier'] = "json";
                $maskConfiguration['content_elements_folder'] = "";
                $maskConfiguration['backend_layouts_folder'] = "";
                $maskConfiguration['backendlayout_pids'] = "0";
                $maskConfiguration['backend'] = "fileadmin/lynx/mask_project/Resources/Private/Mask/Backend/Templates";
                $maskConfiguration['layouts_backend'] = "fileadmin/lynx/mask_project/Resources/Private/Mask/Backend/Layouts";
                $maskConfiguration['partials_backend'] = "fileadmin/lynx/mask_project/Resources/Private/Mask/Backend/Partials";
                $maskConfiguration['content'] = "fileadmin/lynx/mask_project/Resources/Private/Mask/Frontend/Templates";
                $maskConfiguration['layouts'] = "fileadmin/lynx/mask_project/Resources/Private/Mask/Frontend/Layouts";
                $maskConfiguration['partials'] = "fileadmin/lynx/mask_project/Resources/Private/Mask/Frontend/Partials";
                $maskConfiguration['preview'] = "fileadmin/lynx/mask_project/Resources/Public/Mask/";
                $extensionConfiguration->set('mask', $maskConfiguration);
            } catch (ExtensionConfigurationExtensionNotConfiguredException | ExtensionConfigurationPathDoesNotExistException $e) {
                // Error
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
