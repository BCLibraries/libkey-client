<?php

namespace BCLib\LibKeyClient;

/**
 * Build a LibKeyResponse from raw json
 */
class LibKeyParser
{
    /**
     * Parse a LibKey API response
     *
     * @param string $json the raw JSON string
     * @return LibKeyResponse
     */
    public static function parse(string $json): LibKeyResponse
    {
        $json = json_decode($json, false);
        $data = $json->data;

        $response = new LibKeyResponse();

        $response->setId($data->id ?? null)
            ->setType($data->type ?? null)
            ->setTitle($data->title ?? null)
            ->setDate($data->date ?? null)
            ->setAuthors($data->authors ?? null)
            ->setInPress($data->inPress ?? null)
            ->setFullTextFile($data->fullTextFile ?? null)
            ->setContentLocation($data->contentLocation ?? null)
            ->setAvailableThroughBrowzine($data->availableThroughBrowzine ?? null)
            ->setStartPage($data->startPage ?? null)
            ->setEndPage($data->endPage ?? null)
            ->setBrowzineWebLink($data->browzineWebLink ?? null);

        if (isset($json->included)) {
            $response->setJournals(array_map(self::class . '::parseJournal', $json->included));
        }

        return $response;
    }

    /**
     * Parse a single journal
     *
     * @param \stdClass $json
     * @return Journal
     */
    private static function parseJournal(\stdClass $json): Journal
    {
        $journal = new Journal();
        return $journal->setId($json->id ?? null)
            ->setType($json->type ?? null)
            ->setTitle($json->title ?? null)
            ->setIssn($json->issn ?? null)
            ->setSJRValue($json->sjrValue ?? null)
            ->setCoverImageUrl($json->coverImageUrl ?? null)
            ->setBrowzineEnabled($json->browzineEnabled ?? null)
            ->setBrowzineWebLink($json->browzineWebLink ?? null);
    }
}