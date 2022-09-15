<?php

namespace BCLib\LibKeyClient;

/**
 * API Journal from LibKey
 *
 * Use this as a value object for LibKey API journals instead of the bare stdClass from json_decode. Gives us the
 * benefit of better IDE/static analysis, a more logical structure, and the ability to manipulate the response during
 * parsing if necessary.
 */
class Journal
{
    private int $id;
    private ?string $type;
    private ?string $title;
    private ?string $issn;
    private ?float $sjr_value;
    private ?string $cover_image_url;
    private bool $browzine_enabled;
    private ?string $browzine_web_link;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Journal
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): Journal
    {
        $this->type = $type;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Journal
    {
        $this->title = $title;
        return $this;
    }

    public function getISSN(): ?string
    {
        return $this->issn;
    }

    public function setISSN(?string $issn): Journal
    {
        $this->issn = $issn;
        return $this;
    }

    public function getSJRValue(): ?float
    {
        return $this->sjr_value;
    }

    public function setSJRValue(?float $sjr_value): Journal
    {
        $this->sjr_value = $sjr_value;
        return $this;
    }

    public function getCoverImageUrl(): ?string
    {
        return $this->cover_image_url;
    }

    public function setCoverImageUrl(?string $cover_image_url): Journal
    {
        $this->cover_image_url = $cover_image_url;
        return $this;
    }

    public function isBrowzineEnabled(): bool
    {
        return $this->browzine_enabled;
    }

    public function setBrowzineEnabled(?bool $browzine_enabled): Journal
    {
        $this->browzine_enabled = isset($browzine_enabled) && $browzine_enabled;
        return $this;
    }

    public function getBrowzineWebLink(): ?string
    {
        return $this->browzine_web_link;
    }

    public function setBrowzineWebLink(?string $browzine_web_link): Journal
    {
        $this->browzine_web_link = $browzine_web_link;
        return $this;
    }
}