<?php

namespace Swe\Lynx\Hooks;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawFooterHookInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class BackendContentHook
 *
 * @package Swe\Lynx\Hooks
 */
class BackendContentHook implements PageLayoutViewDrawFooterHookInterface
{
    /**
     * @var string
     */
    private string $extensionKey = 'lynx';

    /**
     * @inheritDoc
     */
    public function preProcess(PageLayoutView &$parentObject, &$info, array &$row)
    {
        if ($row['container']) {
            $info[] = '<b>' . LocalizationUtility::translate('container', $this->extensionKey) . '</b>' . $row['container'];
        }

        if ($row['frame_class'] != 'default') {
            $info[] = '<b>' . LocalizationUtility::translate('frame_class', $this->extensionKey) . '</b> ' . $row['frame_class'];
        }

        if ($row['padding_top']) {
            $result = (int)$row['padding_top'];
            $info[] = '<b>' . LocalizationUtility::translate('padding_top', $this->extensionKey) . ' </b>' . $result;
        }

        if ($row['padding_bottom']) {
            $result = (int)$row['padding_bottom'];
            $info[] = '<b>' . LocalizationUtility::translate('padding_bottom', $this->extensionKey) . ' </b>' . $result;
        }

        if ($row['breakpoint']) {
            $info[] = '<b>' . LocalizationUtility::translate('breakpoint', $this->extensionKey) . ' </b>' . $row['breakpoint'];
        }
    }

}
