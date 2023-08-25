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
    protected string $tagName = 'div';

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
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute('class') . ' ' . $this->arguments['render']['frame_class']
                    );
                } else {
                    $this->tag->addAttribute('class', $this->arguments['render']['frame_class']);
                }
            }

            if (strlen($this->arguments['render']['margin_top_mobile']) > 0) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . 'mt-' . $this->arguments['render']['margin_top_mobile']
                    );
                } else {
                    $this->tag->addAttribute('class', 'mt-' . $this->arguments['render']['margin_top_mobile']);
                }
            }

            if (strlen($this->arguments['render']['margin_bottom_mobile']) > 0) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . 'mb-' . $this->arguments['render']['margin_bottom_mobile']
                    );
                } else {
                    $this->tag->addAttribute('class', 'mb-' . $this->arguments['render']['margin_bottom_mobile']);
                }
            }

            if (strlen($this->arguments['render']['padding_top_mobile']) > 0) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . 'pt-' . $this->arguments['render']['padding_top_mobile']
                    );
                } else {
                    $this->tag->addAttribute('class', 'pt-' . $this->arguments['render']['padding_top_mobile']);
                }
            }

            if (strlen($this->arguments['render']['padding_bottom_mobile']) > 0) {
                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . 'pb-' . $this->arguments['render']['padding_bottom_mobile']
                    );
                } else {
                    $this->tag->addAttribute('class', 'pb-' . $this->arguments['render']['padding_bottom_mobile']);
                }
            }

            if (strlen($this->arguments['render']['margin_top_tablet']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_tablet']) {
                    $breakpoint = $this->arguments['render']['breakpoint_tablet'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'mt-' . $this->arguments['render']['margin_top_tablet']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'mt-' . $this->arguments['render']['margin_top_tablet']
                    );
                }
            }

            if (strlen($this->arguments['render']['margin_bottom_tablet']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_tablet']) {
                    $breakpoint = $this->arguments['render']['breakpoint_tablet'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'mb-' . $this->arguments['render']['margin_bottom_tablet']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'mb-' . $this->arguments['render']['margin_bottom_tablet']
                    );
                }
            }

            if (strlen($this->arguments['render']['padding_top_tablet']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_tablet']) {
                    $breakpoint = $this->arguments['render']['breakpoint_tablet'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'pt-' . $this->arguments['render']['padding_top_tablet']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'pt-' . $this->arguments['render']['padding_top_tablet']
                    );
                }
            }

            if (strlen($this->arguments['render']['padding_bottom_tablet']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_tablet']) {
                    $breakpoint = $this->arguments['render']['breakpoint_tablet'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'pb-' . $this->arguments['render']['padding_bottom_tablet']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'pb-' . $this->arguments['render']['padding_bottom_tablet']
                    );
                }
            }

            if (strlen($this->arguments['render']['space_before_class']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_desktop']) {
                    $breakpoint = $this->arguments['render']['breakpoint_desktop'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'mt-' . $this->arguments['render']['space_before_class']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'mt-' . $this->arguments['render']['space_before_class']
                    );
                }
            }

            if (strlen($this->arguments['render']['space_after_class']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_desktop']) {
                    $breakpoint = $this->arguments['render']['breakpoint_desktop'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'mb-' . $this->arguments['render']['space_after_class']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'mb-' . $this->arguments['render']['space_after_class']
                    );
                }
            }

            if (strlen($this->arguments['render']['padding_top']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_desktop']) {
                    $breakpoint = $this->arguments['render']['breakpoint_desktop'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'pt-' . $this->arguments['render']['padding_top']
                    );
                } else {
                    $this->tag->addAttribute('class', $breakpoint . 'pt-' . $this->arguments['render']['padding_top']);
                }
            }

            if (strlen($this->arguments['render']['padding_bottom']) > 0) {
                $breakpoint = '';

                if ($this->arguments['render']['breakpoint_desktop']) {
                    $breakpoint = $this->arguments['render']['breakpoint_desktop'] . ':';
                }

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute(
                            'class'
                        ) . ' ' . $breakpoint . 'pb-' . $this->arguments['render']['padding_bottom']
                    );
                } else {
                    $this->tag->addAttribute(
                        'class',
                        $breakpoint . 'pb-' . $this->arguments['render']['padding_bottom']
                    );
                }
            }

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
