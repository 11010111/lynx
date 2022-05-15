<?php

namespace Swe\Lynx\ViewHelpers;

use Closure;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class SubstringViewHelper
 *
 * @package Swe\Lynx\ViewHelpers
 */
class SubstringViewHelper extends AbstractViewHelper
{
    /**
     * @inheritDoc
     */
    public function initializeArguments()
    {
        $this->registerArgument('string', 'string', 'The enter string', true);
        $this->registerArgument('offset', 'int', 'The offset', true);
        $this->registerArgument('length', 'int', 'The length', true);
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
        return substr($arguments['string'], $arguments['offset'], $arguments['length']);
    }
}
