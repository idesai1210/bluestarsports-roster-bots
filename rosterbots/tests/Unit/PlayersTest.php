<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/20/18
 * Time: 9:25 PM
 */

namespace Tests\Unit;

use App\Http\Controllers\PlayersController;
use Tests\TestCase;

class PlayersTest extends TestCase
{
    public function testPlayersIndex()
    {
        $response = $this->get('/api/players');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDeletePlayers(){
        $response = $this->get('/api/players');
        $response = json_decode($response->getContent());
        $res = $response->records[0]->playerId;

        $this->json('DELETE', '/api/players/'.$res)
            ->assertStatus(204);
    }

}
