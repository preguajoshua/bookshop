<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_books_page_can_be_viewed()
    {
        //Arrange 
        $title = "A Book";
        $author = Author::factory()->create();
        $book = Book::factory()->create([
            'author_id' => $author->id,
            'title' => $title,
        ]);

        //Action
        $response = $this->get('/books');

        //Assert
        $response->assertStatus(200);
        $response->assertSee($title, $escaped = true);        
    }

    
}
