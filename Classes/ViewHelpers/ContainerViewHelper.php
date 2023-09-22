<?php

namespace Swe\Lynx\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * Class ContainerViewHelper
 *
 * @package Swe\Lynx\ViewHelpers
 */
class ContainerViewHelper extends AbstractTagBasedViewHelper
{
    use AppearanceTrait;

    /**
     * @var string
     */
    protected $tagName = 'div';

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
        $this->registerArgument('as', 'string', 'Type');
        $this->registerArgument('render', 'array', 'Data');
        $this->registerArgument('wrap', 'string', 'Wrap Data');
    }

    public function render()
    {
        if ($this->hasArgument('render')) {
            $this->setAppearanceConfigurations();

            if ($this->arguments['render']['background_color'] && $this->arguments['wrap'] == 'true') {
                $this->tag->addAttribute('data-background', $this->arguments['render']['background_color']);
            }

            if ($this->arguments['render']['html_tag'] && $this->arguments['wrap'] == 'true') {
                $this->tagName = $this->arguments['render']['html_tag'];
            }

            if ($this->arguments['render']['uid'] && !$this->tag->getAttribute(
                    'id'
                ) && $this->arguments['wrap'] == 'true') {
                $this->tag->addAttribute('id', 'c' . $this->arguments['render']['uid'] . 'ai');
            }
        }

        if ($this->hasArgument('as')) {
            $this->tagName = $this->arguments['as'];
        }

        $this->tag->setTagName($this->tagName);
        $this->tag->setContent($this->renderChildren());

        if (
            !$this->arguments['render']['container']
            && !$this->arguments['render']['alignment']
            && !$this->tag->getAttribute('class')
        ) {
            return $this->renderChildren();
        }

        return $this->tag->render();
    }
}
