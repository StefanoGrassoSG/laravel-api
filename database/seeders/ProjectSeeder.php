<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Project;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        if (Storage::disk('public')->exists('uploads/projects')) {
            Storage::disk('public')->deleteDirectory('uploads/projects');
        }
        Storage::disk('public')->makeDirectory('uploads/projects');


        $projects = config('projects');
        

        foreach ($projects as $project) {
            $slug = str()->slug($project['name']);
            $imgPath = null;

            $imgPath = fake()->imageUrl();

            $imgContent = file_get_contents($imgPath);

            $newImagePath = storage_path('app/public/uploads/projects');
            $newImageName = rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999).'.png';
            $fullNewImagePath = $newImagePath.'/'.$newImageName;

            file_put_contents($fullNewImagePath, $imgContent);

            Project::create([
                'name' => $project['name'],
                'slug' => $slug,
                'description' => $project['description'],
                'start_date' => $project['start_date'],
                'end_date' => $project['end_date'],
                'project_status' => $project['project_status'],
                'project_link' => $project['project_link'],
                'type_id' => $project['type_id'],
                'cover_img' => 'uploads/projects/' . $newImageName
            ]);
        }
    }
}
