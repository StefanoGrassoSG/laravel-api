<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Type;

//helpers
use Illuminate\support\facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $types = config('types');

        foreach ($types as $type) {
            $slug = str()->slug($type['name']);
            Type::create([
                'name' => $type['name'],
                'slug' => $slug
            ]);
        }
    }
}
