<?php

namespace BCLib\LibKeyClient;

/**
 * API response from LibKey
 *
 * Use this as a value object for LibKey API responses instead of the bare stdClass from json_decode. Gives us the
 * benefit of better IDE/static analysis, a more logical structure, and the ability to manipulate the response during
 * parsing if necessary.
 */
readonly class LibKeyResponse
{
    public int $id;
    public string $type;
    public string $title;
    public string $date;
    public string $authors;
    public bool $in_press;
    public ?string $full_text_file;
    public ?string $content_location;
    public bool $available_through_browzine;
    public ?string $start_page;
    public ?string $end_page;
    public ?string $browzine_web_link;
    public ?string $retraction_notice_url;
    public bool $is_retracted;

    /** @var Journal[] */
    public array $journals;

    public function __construct(
        int $id,
        string $type,
        string $title,
        string $date,
        string $authors,
        bool $in_press,
        ?string $full_text_file,
        ?string $content_location,
        bool $available_through_browzine,
        ?string $start_page,
        ?string $end_page,
        ?string $browzine_web_link,
        ?string $retraction_notice_url,
        array $journals
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->date = $date;
        $this->authors = $authors;
        $this->in_press = $in_press;
        $this->full_text_file = $full_text_file;
        $this->content_location = $content_location;
        $this->available_through_browzine = $available_through_browzine;
        $this->start_page = $start_page;
        $this->end_page = $end_page;
        $this->browzine_web_link = $browzine_web_link;
        $this->retraction_notice_url = $retraction_notice_url;
        $this->is_retracted = isset($retraction_notice_url) && $retraction_notice_url !== '';
        $this->journals = $journals;
    }

    /** @deprecated */
    public function getId(): int
    {
        return $this->id;
    }

    /** @deprecated */
    public function getType(): string
    {
        return $this->type;
    }

    /** @deprecated */
    public function getTitle(): string
    {
        return $this->title;
    }

    /** @deprecated */
    public function getDate(): string
    {
        return $this->date;
    }

    /** @deprecated */
    public function getAuthors(): string
    {
        return $this->authors;
    }

    /** @deprecated */
    public function isInPress(): bool
    {
        return $this->in_press;
    }

    /** @deprecated */
    public function getFullTextFile(): ?string
    {
        return $this->full_text_file;
    }

    /** @deprecated */
    public function getContentLocation(): ?string
    {
        return $this->content_location;
    }

    /** @deprecated */
    public function isAvailableThroughBrowzine(): bool
    {
        return $this->available_through_browzine;
    }

    /** @deprecated */
    public function getStartPage(): ?string
    {
        return $this->start_page;
    }

    /** @deprecated */
    public function getEndPage(): ?string
    {
        return $this->end_page;
    }

    /** @deprecated */
    public function getBrowzineWebLink(): ?string
    {
        return $this->browzine_web_link;
    }

    /**
     * @return Journal[]
     * @deprecated
     */
    public function getJournals(): array
    {
        return $this->journals;
    }

    /** @deprecated */
    public function getRetractionNoticeUrl(): ?string
    {
        return $this->retraction_notice_url;
    }

    /** @deprecated */
    public function isRetracted(): bool
    {
        return $this->is_retracted;
    }
}
