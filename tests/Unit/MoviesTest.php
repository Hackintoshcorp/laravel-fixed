<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Movie;
use DateTime;

class MoviesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test storing a movie.
     *
     * @return void
     */
    public function testStoreMovie()
    {
        $currentDate = new DateTime();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('movies.store'), [
            'title' => 'Test Movie',
            'description' => 'A test movie',
            'url' => 'http://testmovie.com',
            'img' => UploadedFile::fake()->image('test.jpg')
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Movie added to list successfully.',
        ]);

        $movie = Movie::where('title', 'Test Movie')->first();

        $this->assertDatabaseHas('movies_list', [
            'id' => $movie->id,
            'email' => $user->email,
            'title' => 'Test Movie',
            'description' => 'A test movie',
            'url' => 'http://testmovie.com',
            'seen' => 'Not seen',
            'watch_soon' => '',
        ]);
    }

    /**
     * Test deleting a movie.
     *
     * @return void
     */
    public function testDeleteMovie()
    {
        $user = User::factory()->create();

        $movie = Movie::factory()->create([
            'email' => $user->email,
            'title' => 'Test Movie',
            'description' => 'A test movie',
            'url' => 'http://testmovie.com',
            'img' => 'test.jpg',
            'seen' => 'Not seen',
            'watch_soon' => null,
        ]);

        $response = $this->actingAs($user)->delete(route('movies.destroy', $movie->id));

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Movie deletion was successful.',
        ]);

        $this->assertDatabaseMissing('movies_list', [
            'id' => $movie->id,
        ]);
    }

    public function testToggleSeenMovie()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create(['email' => $user->email, 'seen' => 'Not seen']);
    
        $response = $this->actingAs($user)->patch(route('movies.toggleSeen', $movie->id));
    
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Movie seen status updated successfully.',
        ]);
    
        $this->assertDatabaseHas('movies_list', [
            'id' => $movie->id,
            'seen' => 'yes',
        ]);
    
        $response = $this->actingAs($user)->patch(route('movies.toggleSeen', $movie->id));
    
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Movie seen status updated successfully.',
        ]);
    
        $this->assertDatabaseHas('movies_list', [
            'id' => $movie->id,
            'seen' => 'no',
        ]);
    }
    
    public function testUpdateWatchDate()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create(['email' => $user->email, 'watch_soon' => '']);
    
        $response = $this->actingAs($user)->patch(route('movies.updateWatch', ['id' => $movie->id]), [
            'date' => '2023-04-01',
        ]);
    
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Movie upcoming status updated successfully.',
        ]);
    
        $this->assertDatabaseHas('movies_list', [
            'id' => $movie->id,
            'watch_soon' => '2023-04-01',
        ]);
    }
    
    public function testEditMovie()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create(['email' => $user->email]);
    
        $response = $this->actingAs($user)->post(route('movies.edit', ['id' => $movie->id]), [
            'title' => 'Edited Test Movie',
            'description' => 'An edited test movie',
            'url' => 'http://editedtestmovie.com',
            'img' => UploadedFile::fake()->image('edited-test.jpg')
        ]);
    
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Movie edit was successful.',
        ]);
    
        $this->assertDatabaseHas('movies_list', [
            'id' => $movie->id,
            'title' => 'Edited Test Movie',
            'description' => 'An edited test movie',
            'url' => 'http://editedtestmovie.com',
        ]);
    }
}    