<?php

namespace Swe\Lynx\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Preset
 *
 * @package Swe\Lynx\Domain\Model
 */
class Preset extends AbstractEntity
{
    /**
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $preset;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPreset(): string
    {
        return $this->preset;
    }

    /**
     * @param string $preset
     */
    public function setPreset(string $preset): void
    {
        $this->preset = $preset;
    }

}