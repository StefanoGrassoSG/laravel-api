<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Technology;

//helpers
use Illuminate\support\facades\Schema;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $technologies = config('technologies');

        foreach ($technologies as $technology) {
            $slug = str()->slug($technology['name']);
            Technology::create([
                'name' => $technology['name'],
                'slug' => $slug
            ]);
        }
    }
}
