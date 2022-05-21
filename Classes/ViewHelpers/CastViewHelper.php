<?php

namespace Swe\Lynx\ViewHelpers;

use Closure;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class CastViewHelper
 *
 * @package Swe\Lynx\ViewHelpers
 */
class CastViewHelper extends AbstractViewHelper
{
    /**
     * @inheritDoc
     */
    public function initializeArguments()
    {
        $this->registerArgument('toInt', 'string', 'The string', true);
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
        return (int) $arguments['toInt'];
    }
}
