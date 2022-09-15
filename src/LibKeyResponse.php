<?php

namespace BCLib\LibKeyClient;

/**
 * API response from LibKey
 *
 * Use this as a value object for LibKey API responses instead of the bare stdClass from json_decode. Gives us the
 * benefit of better IDE/static analysis, a more logical structure, and the ability to manipulate the response during
 * parsing if necessary.
 */
class LibKeyResponse
{
    private int $id;
    private string $type;
    private string $title;
    private string $date;
    private string $authors;
    private bool $in_press = false;
    private ?string $full_text_file;
    private ?string $content_location;
    private bool $available_through_browzine;
    private ?string $start_page;
    private ?string $end_page;
    private ?string $browzine_web_link;
    private ?string $retraction_notice_url;

    /** @var Journal[] */
    private array $journals;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): LibKeyResponse
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): LibKeyResponse
    {
        $this->type = $type;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): LibKeyResponse
    {
        $this->title = $title;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): LibKeyResponse
    {
        $this->date = $date;
        return $this;
    }

    public function getAuthors(): string
    {
        return $this->authors;
    }

    public function setAuthors(string $authors): LibKeyResponse
    {
        $this->authors = $authors;
        return $this;
    }

    public function isInPress(): bool
    {
        return $this->in_press;
    }

    public function setInPress(bool $in_press): LibKeyResponse
    {
        $this->in_press = $in_press;
        return $this;
    }

    public function getFullTextFile(): ?string
    {
        return $this->full_text_file;
    }

    public function setFullTextFile(?string $full_text_file): LibKeyResponse
    {
        $this->full_text_file = $full_text_file;
        return $this;
    }

    public function getContentLocation(): ?string
    {
        return $this->content_location;
    }

    public function setContentLocation(?string $content_location): LibKeyResponse
    {
        $this->content_location = $content_location;
        return $this;
    }

    public function isAvailableThroughBrowzine(): bool
    {
        return $this->available_through_browzine;
    }

    public function setAvailableThroughBrowzine(bool $available_through_browzine): LibKeyResponse
    {
        $this->available_through_browzine = $available_through_browzine;
        return $this;
    }

    public function getStartPage(): ?string
    {
        return $this->start_page;
    }

    public function setStartPage(?string $start_page): LibKeyResponse
    {
        $this->start_page = $start_page;
        return $this;
    }

    public function getEndPage(): ?string
    {
        return $this->end_page;
    }

    public function setEndPage(?string $end_page): LibKeyResponse
    {
        $this->end_page = $end_page;
        return $this;
    }

    public function getBrowzineWebLink(): ?string
    {
        return $this->browzine_web_link;
    }

    public function setBrowzineWebLink(?string $browzine_web_link): LibKeyResponse
    {
        $this->browzine_web_link = $browzine_web_link;
        return $this;
    }

    /**
     * @return Journal[]
     */
    public function getJournals(): array
    {
        return $this->journals;
    }

    /**
     * @param Journal[] $journals
     * @return LibKeyResponse
     */
    public function setJournals(array $journals): LibKeyResponse
    {
        $this->journals = $journals;
        return $this;
    }

    public function getRetractionNoticeUrl(): ?string
    {
        return $this->retraction_notice_url;
    }

    public function setRetractionNoticeUrl(?string $url): LibKeyResponse
    {
        $this->retraction_notice_url = $url;
        return $this;
    }

    public function isRetracted(): bool
    {
        return isset($this->retraction_notice_url) && $this->retraction_notice_url !== '';
    }
}