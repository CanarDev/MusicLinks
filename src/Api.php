<?php

declare(strict_types=1);

namespace Canardev\MusicLinks;

class Api
{
    /**
     * @param $spotifyUrl string
     * @param $country string
     * @return array
     *
     */
    public function getArtistOrTrackLinks(string $spotifyUrl, string $country): array
    {
        // get the response from songwhip api
        $response = file_get_contents('https://songwhip.com/api/songwhip/create', false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode([
                    'url' => $spotifyUrl,
                    'country' => $country
                ])
            ]
        ]));

        // decode the response
        /**
         * @param mixed[][][] $responseDecoded
         */
        $responseDecoded = (array)json_decode((string) $response, true);

        // empty array to store all links
        $allArtistLinks = [];

        // get all links
        $links = $responseDecoded['data']['item']['links'];

        foreach ($links as $key => $link) {

            // link data
            $url = $link[0]['link'];
            $countries = $link[0]['countries'][0] ?? '';

            // Check if the link contains {country} and replace it with the country code
            if (str_contains($url, '{country}')) {
                $url =  str_replace('{country}', $countries, $url);
            }

            // append in array the link value
            $allArtistLinks = [
                ...$allArtistLinks,
                [
                    $key => $url,
                ]
            ];
        }

        return $allArtistLinks;
    }
}
