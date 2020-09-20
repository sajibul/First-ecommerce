<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('products')->insert([
//            'title' => 'hello-e',
//            'slug'=>'hello',
//            'category_id' => Category::all()->random()->id,
//            'description'=>'lorem lorem auss dasfs fsdfsf dusk skfundk',
//            'price'=>'1000',
//        ]);


        factory(Product::class,20)->create();

        $products = Product::select()->get();

        foreach($products as $product){
            $product->addMediaFromUrl('https://lorempixel.com/640/480/?43686')->toMediaCollection('product');
        }
    }
}
