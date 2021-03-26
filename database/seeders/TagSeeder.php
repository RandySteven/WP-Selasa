<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            'C', 'PHP', 'Java', 'SQL', 'Python'
        ]);
        $tags->each(function ($i){
            Tag::create([
                'tag' => $i,
                'slug' => \Str::slug($i)
            ]);
        });

    }
}
