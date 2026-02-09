<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_can_be_created()
    {
        Storage::fake('public');

        $user = User::factory()->create(['role' => 'admin']);
        $category = Category::create([
            'name' => 'Test Category ' . uniqid(),
            'slug' => 'test-category-' . uniqid(),
        ]);

        $response = $this->actingAs($user)->post('/admin/products', [
            'name' => 'Test Product ' . uniqid(),
            'category_id' => $category->id,
            'price' => 100,
            'description' => 'Test Description',
            'is_featured' => '1',
            'is_top_selling' => '1',
            'image' => UploadedFile::fake()->image('product.jpg')
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/products');

        $this->assertDatabaseHas('products', [
            'category_id' => $category->id,
            'is_featured' => 1,
            'is_top_selling' => 1,
        ]);
        
        // Cleanup (Basic cleanup since we are not using RefreshDatabase)
        $category->delete();
        $user->delete();
    }

    public function test_product_can_be_updated()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $category = Category::create([
            'name' => 'Test Category ' . uniqid(),
            'slug' => 'test-category-' . uniqid(),
        ]);
        
        $product = Product::create([
            'name' => 'Original Product ' . uniqid(),
            'slug' => 'original-product-' . uniqid(),
            'category_id' => $category->id,
            'price' => 50,
            'is_featured' => false,
            'is_top_selling' => false,
        ]);

        $response = $this->actingAs($user)->put("/admin/products/{$product->id}", [
            'name' => 'Updated Product ' . uniqid(),
            'category_id' => $category->id,
            'price' => 150,
            'description' => 'Updated Description',
            'is_featured' => '1',
            'is_top_selling' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/products');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'is_featured' => 1,
            'is_top_selling' => 1,
        ]);

        // Cleanup
        $product->delete();
        $category->delete();
        $user->delete();
    }
}
