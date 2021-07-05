<?php

namespace Swe\Lynx\Hooks;

use phpDocumentor\Reflection\Types\Integer;
use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawFooterHookInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class BackendContentHook
 * @package Swe\Lynx\Hooks
 */
class BackendContentHook implements PageLayoutViewDrawFooterHookInterface
{
    /**
     * @var string
     */
    private $extensionKey = 'lynx';

    /**
     * @param PageLayoutView $parentObject
     * @param array $info
     * @param array $row
     */
    public function preProcess(PageLayoutView &$parentObject, &$info, array &$row)
    {
        if ($row['layout'] == 1) {
            $info[] = '<b>' . LocalizationUtility::translate('full_width', $this->extensionKey) . '</b>';
        }

        if ($row['frame_class'] != 'default') {
            $info[] = '<b>' . LocalizationUtility::translate('frame_class', $this->extensionKey) . '</b> ' . $row['frame_class'];
        }

        if ($row['frame_class_extra']) {
            $info[] = '<b>' . LocalizationUtility::translate('frame_class_extra', $this->extensionKey) . '</b> ' . $row['frame_class_extra'];
        }

        if ($row['space_left_class']) {
            $result = null;

            if ((int)$row['space_left_class'] > 0) {
                $result = (int) $row['space_left_class'];
            } else {
                $result = LocalizationUtility::translate(
                    str_replace('-', '_', $row['space_left_class']), $this->extensionKey
                );
            }

            $info[] = '<b>' . LocalizationUtility::translate('space_left', $this->extensionKey) . ' </b>' . $result;
        }

        if ($row['space_right_class']) {
            $result = null;

            if ((int)$row['space_right_class'] > 0) {
                $result = (int)$row['space_right_class'];
            } else {
                $result = LocalizationUtility::translate(
                    str_replace('-', '_', $row['space_right_class']), $this->extensionKey
                );
            }

            $info[] = '<b>' . LocalizationUtility::translate('space_right', $this->extensionKey) . ' </b>' . $result;

        }

        if ($row['display_on']) {
            $info[] = '<b>' . LocalizationUtility::translate('display_on', $this->extensionKey) . ' </b>'
                . LocalizationUtility::translate('display_on.' . $row['display_on'], $this->extensionKey);
        }
    }

}
