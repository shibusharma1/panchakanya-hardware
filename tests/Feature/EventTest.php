<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_can_be_created()
    {
        Storage::fake('public');
        
        $user = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($user)->post('/admin/events', [
            'title' => 'Feature Test Event',
            'date' => '2026-03-01',
            'location' => 'Test Lab',
            'description' => 'Testing via PHPUnit',
            'is_active' => '1',
            'image' => UploadedFile::fake()->image('event.jpg')
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/events');

        $this->assertDatabaseHas('events', [
            'title' => 'Feature Test Event',
            'location' => 'Test Lab',
            'is_active' => 1,
        ]);
    }

    public function test_event_can_be_updated()
    {
        $event = Event::create([
            'title' => 'Original Title',
            'slug' => 'original-title',
            'date' => '2026-01-01',
            'location' => 'Original Loc',
            'description' => 'Desc',
            'is_active' => true,
        ]);

        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->put("/admin/events/{$event->id}", [
            'title' => 'Updated Title',
            'date' => '2026-01-02',
            'location' => 'Updated Loc',
            'description' => 'Updated Desc',
            'is_active' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/events');

        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'title' => 'Updated Title',
            'location' => 'Updated Loc',
        ]);
    }
}
