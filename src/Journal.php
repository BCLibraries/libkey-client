<?php

namespace BCLib\LibKeyClient;

/**
 * API Journal from LibKey
 *
 * Use this as a value object for LibKey API journals instead of the bare stdClass from json_decode. Gives us the
 * benefit of better IDE/static analysis, a more logical structure, and the ability to manipulate the response during
 * parsing if necessary.
 */
readonly class Journal
{
    public int $id;
    public ?string $type;
    public ?string $title;
    public ?string $issn;
    public ?float $sjr_value;
    public ?string $cover_image_url;
    public bool $browzine_enabled;
    public ?string $browzine_web_link;

    public function __construct(
        string $id,
        ?string $type,
        ?string $title,
        ?string $issn,
        ?float $sjr_value,
        ?string $cover_image_url,
        bool $browzine_enabled,
        ?string $browzine_web_link
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->issn = $issn;
        $this->sjr_value = $sjr_value;
        $this->cover_image_url = $cover_image_url;
        $this->browzine_enabled = $browzine_enabled;
        $this->browzine_web_link = $browzine_web_link;
    }


    /** @deprecated */
    public function getId(): int
    {
        return $this->id;
    }

    /** @deprecated */
    public function getType(): ?string
    {
        return $this->type;
    }

    /** @deprecated */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /** @deprecated */
    public function getISSN(): ?string
    {
        return $this->issn;
    }

    /** @deprecated */
    public function getSJRValue(): ?float
    {
        return $this->sjr_value;
    }

    /** @deprecated */
    public function getCoverImageUrl(): ?string
    {
        return $this->cover_image_url;
    }

    /** @deprecated */
    public function isBrowzineEnabled(): bool
    {
        return $this->browzine_enabled;
    }

    /** @deprecated */
    public function getBrowzineWebLink(): ?string
    {
        return $this->browzine_web_link;
    }
}
