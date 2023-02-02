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
        $this->registerArgument('as', 'string', 'Type');
        $this->registerArgument('render', 'array', 'Data');
        $this->registerArgument('wrap', 'string', 'Wrap Data');
    }

    public function render()
    {
        if ($this->hasArgument('render')) {
            if ($this->arguments['render']['container']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . $this->arguments['render']['container']);
                } else {
                    $this->tag->addAttribute('class',  $this->arguments['render']['container']);
                }
            }

            if ($this->arguments['render']['alignment']) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' container-' . $this->arguments['render']['alignment']);
                } else {
                    $this->tag->addAttribute('class',  'container-' . $this->arguments['render']['alignment']);
                }
            }

            if ($this->arguments['render']['frame_class'] && $this->arguments['wrap'] == 'true') {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . $this->arguments['render']['frame_class']);
                } else {
                    $this->tag->addAttribute('class',  $this->arguments['render']['frame_class']);
                }
            }

            if ($this->arguments['render']['space_before_class'] && $this->arguments['wrap'] == 'true') {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-before-' . $this->arguments['render']['space_before_class']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-before-' . $this->arguments['render']['space_before_class']);
                }
            }

            if ($this->arguments['render']['space_after_class'] && $this->arguments['wrap'] == 'true') {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-after-' . $this->arguments['render']['space_after_class']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-after-' . $this->arguments['render']['space_after_class']);
                }
            }

            if ($this->arguments['render']['padding_top'] && $this->arguments['wrap'] == 'true') {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-inline-before-' . $this->arguments['render']['padding_top']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-inline-before-' . $this->arguments['render']['padding_top']);
                }
            }

            if ($this->arguments['render']['padding_bottom'] && $this->arguments['wrap'] == 'true') {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute('class', $this->tag->getAttribute('class') . ' ' . 'frame-space-inline-after-' . $this->arguments['render']['padding_bottom']);
                } else {
                    $this->tag->addAttribute('class', 'frame-space-inline-after-' . $this->arguments['render']['padding_bottom']);
                }
            }

            if ($this->arguments['render']['background_color'] && $this->arguments['wrap'] == 'true') {
                $this->tag->addAttribute('data-background', $this->arguments['render']['background_color']);
            }

            if ($this->arguments['render']['foreground_color'] && $this->arguments['wrap'] == 'true') {
                $this->tag->addAttribute('data-foreground', $this->arguments['render']['foreground_color']);
            }

            if ($this->arguments['render']['html_tag'] && $this->arguments['wrap'] == 'true') {
                $this->tagName = $this->arguments['render']['html_tag'];
            }

            if ($this->arguments['render']['uid'] && !$this->tag->getAttribute('id') && $this->arguments['wrap'] == 'true') {
                $this->tag->addAttribute('id',  'c' . $this->arguments['render']['uid'] . 'ai');
            }
        }

        if ($this->hasArgument('as')) {
            $this->tagName = $this->arguments['as'];
        }

        $this->tag->setTagName($this->tagName);
        $this->tag->setContent($this->renderChildren());

        if (!$this->arguments['render']['container'] && !$this->arguments['render']['alignment'] && !$this->tag->getAttribute('class')) {
            return $this->renderChildren();
        }

        return $this->tag->render();
    }
}
