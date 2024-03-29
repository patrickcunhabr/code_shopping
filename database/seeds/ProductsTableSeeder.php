<?php


use Illuminate\Database\Seeder;
use CodeShopping\Models\Product;
use CodeShopping\Models\Category;
use CodeShopping\Models\ProductInput;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $productInputs = ProductInput::all();
        factory(\CodeShopping\Models\Product::class,30)
        ->create()
        ->each(function(Product $product) use ($categories){
            $categoryId = $categories->random()->id;
            $product->categories()->attach($categoryId);
        });
        
    }
}
