<?php

namespace Swe\Lynx\Hooks;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawFooterHookInterface;

/**
 * Class BackendContentHook
 * @package Swe\Lynx\Hooks
 */
class BackendContentHook implements PageLayoutViewDrawFooterHookInterface
{
    /**
     * @param PageLayoutView $parentObject
     * @param array $info
     * @param array $row
     */
    public function preProcess(PageLayoutView &$parentObject, &$info, array &$row)
    {
        if ($row['layout'] == 1) {
            $info[] = '<b>Full Width</b>';
        }

        if ($row['frame_class'] != 'default') {
            $info[] = '<b>Frame Class</b> ' . $row['frame_class'];
        }

        if ($row['frame_class_extra'] != '') {
            $info[] = '<b>Frame Class Extra</b> ' . $row['frame_class_extra'];
        }

        if ($row['space_left_class'] != '') {
            $info[] = '<b>Space Left</b> ' . $row['space_left_class'];
        }

        if ($row['space_right_class'] != '') {
            $info[] = '<b>Space Right</b> ' . $row['space_right_class'];
        }

        if ($row['no_mobile'] != 0) {
            $info[] = '<b>No Mobile</b>';
        }
    }

}
