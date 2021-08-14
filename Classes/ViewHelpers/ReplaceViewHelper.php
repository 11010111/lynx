<?php

namespace Swe\Lynx\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ReplaceViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        $this->registerArgument('search', 'string', 'The search string', true);
        $this->registerArgument('replace', 'string', 'The replace string', true);
        $this->registerArgument('object', 'string', 'The object string', true);
    }

    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        return str_replace($arguments['search'], $arguments['replace'], $arguments['object']);
    }
}
