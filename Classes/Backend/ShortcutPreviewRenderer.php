<?php
declare(strict_types=1);
namespace Swe\Lynx\Backend;

use Throwable;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumn;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Frontend\Preview\TextmediaPreviewRenderer;
use UnexpectedValueException;

class ShortcutPreviewRenderer extends TextmediaPreviewRenderer
{
    const TABLE_NAME = 'tt_content';

    protected string $template = 'EXT:lynx/Resources/Private/Templates/PreviewRenderer/Shortcut.html';

    public function renderPageModulePreviewContent(GridColumnItem $item): string
    {
        try {
            $contentIdentifiers = $this->getContentIdentifiers($item->getRecord());
            $elements = '';
            foreach ($contentIdentifiers as $identifier) {
                $elements .= $this->getPreviewOfSingleContentElement($item, $identifier);
            }
        } catch (Throwable $exception) {
            $elements = $exception->getMessage() . ' (' . $exception->getCode() . ')';
        }
        return $elements;
    }

    protected function getPreviewOfSingleContentElement(GridColumnItem $item, $identifier): string
    {
        $record = BackendUtility::getRecord(self::TABLE_NAME, $identifier);
        $gridColumn = GeneralUtility::makeInstance(GridColumn::class, $item->getContext(), []);
        $gridColumnItem = GeneralUtility::makeInstance(GridColumnItem::class, $item->getContext(), $gridColumn, $record);
        $standaloneView = GeneralUtility::makeInstance(StandaloneView::class);
        $standaloneView->setTemplatePathAndFilename($this->template);
        $standaloneView->assignMultiple([
            'preview' => $gridColumnItem->getPreview(),
            'identifier' => $identifier,
            'data' => $record,
            'iconIdentifier' => $this->getIconIdentifier($record['CType']),
        ]);
        return $standaloneView->render();
    }

    protected function getContentIdentifiers(array $data): array
    {
        if (isset($data['records']) === false) {
            throw new UnexpectedValueException('Key records not available', 1676669367);
        }
        $identifiers = [];
        $mixedIdentifiers = explode(',', $data['records']);
        foreach ($mixedIdentifiers as $identifier) {
            $cleanedIdentifier = str_replace(self::TABLE_NAME . '_', '', $identifier);
            if (MathUtility::canBeInterpretedAsInteger($cleanedIdentifier)) {
                $identifiers[] = (int)$cleanedIdentifier;
            } else {
                throw new UnexpectedValueException($identifier . ' is not a supported identifier', 1676669672);
            }
        }
        return $identifiers;
    }

    /**
     * @param string $cType
     * @return string
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function getIconIdentifier(string $cType): string
    {
        $typeiconClasses = $GLOBALS['TCA'][self::TABLE_NAME]['ctrl']['typeicon_classes'];
        if (array_key_exists($cType, $typeiconClasses)) {
            return $typeiconClasses[$cType];
        }
        return 'mimetypes-x-content-text-media';
    }
}