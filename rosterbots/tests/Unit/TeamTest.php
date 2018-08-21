<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/19/18
 * Time: 9:28 PM
 */

namespace Tests\Unit;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Tests\TestCase;

class TeamTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/api/teams');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testCreateTeam(){
        $payload = ['teamName' => 'PhpUnitTest'];

        $this->json('POST', '/api/teams', $payload)
            ->assertStatus(201);
    }

}
