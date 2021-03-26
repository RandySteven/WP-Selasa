<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Business', 'Sport', 'Technology', 'Economy', 'Travel', 'AI', 'Japanese'
        ]);
        $categories->each(function ($i){
            Category::create([
                'category' => $i,
                'slug' => \Str::slug($i)
            ]);
        });
    }
}
