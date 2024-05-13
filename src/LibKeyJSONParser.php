<?php

namespace BCLib\LibKeyClient;

use stdClass;

/**
 * Build a LibKeyResponse from raw json
 */
class LibKeyJSONParser
{
    public static function parse(string $json): LibKeyResponse
    {
        $json = json_decode($json, false);
        $data = $json->data;

        return new LibKeyResponse(
            id: $data->id ?? null,
            type: $data->type ?? null,
            title: $data->title ?? null,
            date: $data->date ?? null,
            authors: $data->authors ?? null,
            in_press: $data->inPress ?? null,
            full_text_file: $data->fullTextFile ?? null,
            content_location: $data->contentLocation ?? null,
            available_through_browzine: $data->availableThroughBrowzine ?? null,
            start_page: $data->startPage ?? null,
            end_page: $data->endPage ?? null,
            browzine_web_link: $data->browzineWebLink ?? null,
            retraction_notice_url: $data->inPress ?? null,
            journals: self::parseJournalsList($json)
        );
    }

    /**
     * @param stdClass $json
     * @return Journal[]
     */
    private static function parseJournalsList(stdClass $json): array
    {
        if (!isset($json->included)) {
            return [];
        }
        return array_map('BCLib\LibKeyClient\LibKeyJSONParser::parseJournal', $json->included);
    }

    private static function parseJournal(stdClass $json): Journal
    {
        return new Journal(
            id: $json->id ?? null,
            type: $json->type ?? null,
            title: $json->title ?? null,
            issn: $json->issn ?? null,
            sjr_value: $json->sjrValue ?? null,
            cover_image_url: $json->coverImageUrl ?? null,
            browzine_enabled: $json->browzineEnabled ?? false,
            browzine_web_link: $json->browzineWebLink ?? null
        );
    }
}
