<?php

namespace Swe\Lynx\ViewHelpers;

use JetBrains\PhpStorm\ArrayShape;

const APPEARANCE_CONFIGURATION = [
    'name' => 'string',
    'wrap' => 'null|boolean',
    'prefix' => 'null|string',
    'breakpoint' => 'null|string',
];

trait AppearanceTrait
{

    #[ArrayShape([APPEARANCE_CONFIGURATION])]
    private static array $appearanceConfigurations = [
        [
            'name' => 'container',
        ],
        [
            'name' => 'alignment',
        ],
        [
            'name' => 'frame_class',
            'wrap' => true,
        ],
        [
            'name' => 'margin_top_mobile',
            'wrap' => true,
            'prefix' => 'mt-',
        ],
        [
            'name' => 'margin_bottom_mobile',
            'wrap' => true,
            'prefix' => 'mb-',
        ],
        [
            'name' => 'padding_top_mobile',
            'wrap' => true,
            'prefix' => 'pt-',
        ],
        [
            'name' => 'padding_bottom_mobile',
            'wrap' => true,
            'prefix' => 'pb-',
        ],
        [
            'name' => 'margin_top_tablet',
            'wrap' => true,
            'prefix' => 'mt-',
            'breakpoint' => 'breakpoint_tablet',
        ],
        [
            'name' => 'margin_bottom_tablet',
            'wrap' => true,
            'prefix' => 'mb-',
            'breakpoint' => 'breakpoint_tablet',
        ],
        [
            'name' => 'padding_top_tablet',
            'wrap' => true,
            'prefix' => 'pt-',
            'breakpoint' => 'breakpoint_tablet',
        ],
        [
            'name' => 'padding_bottom_tablet',
            'wrap' => true,
            'prefix' => 'pb-',
            'breakpoint' => 'breakpoint_tablet',
        ],
        [
            'name' => 'space_before_class',
            'wrap' => true,
            'prefix' => 'mt-',
            'breakpoint' => 'breakpoint_desktop',
        ],
        [
            'name' => 'space_after_class',
            'wrap' => true,
            'prefix' => 'mb-',
            'breakpoint' => 'breakpoint_desktop',
        ],
        [
            'name' => 'padding_top',
            'wrap' => true,
            'prefix' => 'mb-',
            'breakpoint' => 'breakpoint_desktop',
        ],
        [
            'name' => 'padding_bottom',
            'wrap' => true,
            'prefix' => 'mb-',
            'breakpoint' => 'breakpoint_desktop',
        ],
    ];

    protected function setAppearanceConfigurations(bool $takeOfWrap = true, array $exclude = []): void
    {
        if (!$this->hasArgument('render')) {
            return;
        }

        foreach (self::$appearanceConfigurations as $argumentConfig) {
            $name = $argumentConfig['name'];

            if (in_array($name, $exclude)) {
                continue;
            }

            $useWrap = isset($argumentConfig['wrap']) && $argumentConfig['wrap'];
            $prefix = $argumentConfig['prefix'] ?? '';
            $breakpointName = $argumentConfig['breakpoint'] ?? '';
            $breakpoint = '';

            if (strlen($this->arguments['render'][$name]) > 0) {
                if ($takeOfWrap && $useWrap && $this->arguments['wrap'] !== 'true') {
                    continue;
                }

                if (!empty($breakpointName) && $this->arguments['render'][$breakpointName]) {
                    $breakpoint = $this->arguments['render'][$breakpointName] . ':';
                }

                $className = $breakpoint . $prefix . $this->arguments['render'][$name];

                if ($this->tag->getAttribute('class')) {
                    $this->tag->addAttribute(
                        'class',
                        $this->tag->getAttribute('class') . ' ' . $className
                    );
                } else {
                    $this->tag->addAttribute('class', $className);
                }
            }
        }
    }
}
