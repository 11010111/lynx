<?php

namespace Swe\Lynx\ViewHelpers;

use Closure;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class ReplaceViewHelper
 *
 * @package Swe\Lynx\ViewHelpers
 */
class ReplaceViewHelper extends AbstractViewHelper
{
    /**
     * @inheritDoc
     */
    public function initializeArguments()
    {
        $this->registerArgument('search', 'string', 'The search string', true);
        $this->registerArgument('replace', 'string', 'The replace string', true);
        $this->registerArgument('object', 'string', 'The subject string', true);
    }

    /**
     * @inheritDoc
     */
    public static function renderStatic(
        array                     $arguments,
        Closure                   $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    )
    {
        return str_replace($arguments['search'], $arguments['replace'], $arguments['object']);
    }
}
