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
    }

    public function render()
    {
        if ($this->hasArgument('render')) {
            if ($this->arguments['render']['frame_class']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . $this->arguments['render']['frame_class']);
                } else {
                    $this->tag->addAttribute('class',  $this->arguments['render']['frame_class']);
                }
            }

            if ($this->arguments['render']['space_before_class']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'mt-' . $this->arguments['render']['space_before_class']);
                } else {
                    $this->tag->addAttribute('class', 'mt-' . $this->arguments['render']['space_before_class']);
                }
            }

            if ($this->arguments['render']['space_after_class']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'mb-' . $this->arguments['render']['space_after_class']);
                } else {
                    $this->tag->addAttribute('class', 'mb-' . $this->arguments['render']['space_after_class']);
                }
            }

            if ($this->arguments['render']['padding_top']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'pt-' . $this->arguments['render']['padding_top']);
                } else {
                    $this->tag->addAttribute('class', 'pt-' . $this->arguments['render']['padding_top']);
                }
            }

            if ($this->arguments['render']['padding_bottom']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'pb-' . $this->arguments['render']['padding_bottom']);
                } else {
                    $this->tag->addAttribute('class', 'pb-' . $this->arguments['render']['padding_bottom']);
                }
            }

            if ($this->arguments['render']['background_color']) {
                $this->tag->addAttribute('data-background', $this->arguments['render']['background_color']);
            }

            if ($this->arguments['render']['foreground_color']) {
                $this->tag->addAttribute('data-foreground', $this->arguments['render']['foreground_color']);
            }

            if ($this->arguments['render']['html_tag']) {
                $this->tagName = $this->arguments['render']['html_tag'];
            }

            if ($this->arguments['render']['uid'] && !$this->tag->getAttribute('id')) {
                $this->tag->addAttribute('id',  'c' . $this->arguments['render']['uid']);
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
