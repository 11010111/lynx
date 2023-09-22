<?php

namespace Swe\Lynx\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * Class WrapperViewHelper
 *
 * @package Swe\Lynx\ViewHelpers
 */
class WrapperViewHelper extends AbstractTagBasedViewHelper
{
    use AppearanceTrait;

    /**
     * @var string
     */
    protected $tagName = 'div';

    private static array $excludeAppearanceConfigurations = [
        'container',
        'alignment',
    ];

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
        $this->registerArgument('as', 'string', 'Type');
        $this->registerArgument('render', 'array', 'Data');
    }

    public function render()
    {
        if ($this->hasArgument('render')) {
            $this->setAppearanceConfigurations(false, self::$excludeAppearanceConfigurations);

            if ($this->arguments['render']['background_color']) {
                $this->tag->addAttribute('data-background', $this->arguments['render']['background_color']);
            }

            if ($this->arguments['render']['html_tag']) {
                $this->tagName = $this->arguments['render']['html_tag'];
            }

            if ($this->arguments['render']['uid'] && !$this->tag->getAttribute('id')) {
                $this->tag->addAttribute('id', 'c' . $this->arguments['render']['uid']);
            }
        }

        if ($this->hasArgument('as')) {
            $this->tagName = $this->arguments['as'];
        }

        $this->tag->setTagName($this->tagName);
        $this->tag->setContent($this->renderChildren());

        return $this->tag->render();
    }
}
