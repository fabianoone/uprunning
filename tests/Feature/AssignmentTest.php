<?php

namespace Tests\Feature;

use App\Assignment;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Writing a simple POST route test.
     *
     * @return void
     */
    public function test_post_creates_new_assignment()
    {
        $response = $this->post('/assignments', [
            'title' => 'My great assignment',
            'description' => 'Occaecat ullamco sed dolore sed anim. Sed, dolore sed anim ad. Anim ad irure fugiat pariatur sit qui. Irure fugiat pariatur sit, qui. Sit qui lorem, ipsum. Ipsum non magna dolor, quis. Dolor quis tempor voluptate eiusmod id duis. Tempor voluptate eiusmod id duis pariatur.'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('assignments', [
            'title' => 'My great assignment',
        ]);
    }

    public function test_list_page_shows_all_assignments()
    {
        $assignment = Assignment::create([
            'title' => 'My great assignment',
        ]);

        $this->get('/assignments')
            ->assertSeeText('My great assignment');
    }
}
