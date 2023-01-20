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
    /**
     * @var string
     */
    protected $tagName = 'div';

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
        $this->registerArgument('as', 'string', 'Container type');
        $this->registerArgument('containerData', 'array', 'Container data');
    }

    public function render()
    {
        if ($this->hasArgument('containerData')) {
            if ($this->arguments['containerData']['frame_class']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . $this->arguments['containerData']['frame_class']);
                } else {
                    $this->tag->addAttribute('class',  $this->arguments['containerData']['frame_class']);
                }
            }

            if ($this->arguments['containerData']['space_before_class']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-before-' . $this->arguments['containerData']['space_before_class']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-before-' . $this->arguments['containerData']['space_before_class']);
                }
            }

            if ($this->arguments['containerData']['space_after_class']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-after-' . $this->arguments['containerData']['space_after_class']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-after-' . $this->arguments['containerData']['space_after_class']);
                }
            }

            if ($this->arguments['containerData']['padding_top']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-inline-before-' . $this->arguments['containerData']['padding_top']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-inline-before-' . $this->arguments['containerData']['padding_top']);
                }
            }

            if ($this->arguments['containerData']['padding_bottom']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-inline-after-' . $this->arguments['containerData']['padding_bottom']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-inline-after-' . $this->arguments['containerData']['padding_bottom']);
                }
            }

            if ($this->arguments['containerData']['background_color']) {
                $this->tag->addAttribute('data-background', $this->arguments['containerData']['background_color']);
            }

            if ($this->arguments['containerData']['foreground_color']) {
                $this->tag->addAttribute('data-foreground', $this->arguments['containerData']['foreground_color']);
            }

            if ($this->arguments['containerData']['html_tag']) {
                $this->tagName = $this->arguments['containerData']['html_tag'];
            }

            if ($this->arguments['containerData']['uid'] && !$this->tag->getAttribute('id')) {
                $this->tag->addAttribute('id',  'c' . $this->arguments['containerData']['uid']);
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
