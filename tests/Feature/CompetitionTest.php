<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompetitionTest extends TestCase
{
    use RefreshDatabase;    

    public function test_user_can_create_competition()
    {
        /** @var \App\Models\User $user */

        $user = User::factory()->create();

        $competitionData = [
            'name' => 'Teste',
            'date' => '2026-01-01',
            'location' => 'PR'
        ];

        $response = $this->actingAs($user)
            ->postJson('/api/competitions', $competitionData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('competitions', [
            'name' => 'Teste',
            'location' => 'PR',
            'owner_id' => $user->id
        ]);
    }

}
