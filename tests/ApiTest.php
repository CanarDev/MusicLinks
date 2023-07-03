<?php

use Canardev\MusicLinks\Api;
use PHPUnit\Framework\TestCase;

class  ApiTest extends TestCase
{
    public function testGetArtistLinks()
    {
        $api = new Api();
        // test Artist links
        $this->assertIsArray($api->getArtistOrTrackLinks('https://open.spotify.com/artist/0u18Cq5stIQLUoIaULzDmA', 'FR'));

        // test Track links
        $this->assertIsArray($api->getArtistOrTrackLinks('https://open.spotify.com/track/3mhmsgWbnEex2qBUZEUnCK', 'FR'));
    }
}