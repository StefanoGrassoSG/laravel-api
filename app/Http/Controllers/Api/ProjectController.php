<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models 
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {

        $projects = Project::with('type', 'technologies')->paginate(4);

        if($projects) {
            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'Ok',
                'results' => $projects
            ]);
        }
        else {
            return response()->json([
                'code' => 404,
                'success' => false,
                'message' => 'projects not founds',
            ]);
        }

        
    }

    public function show(string $slug) {

        $project = Project::where('slug', $slug)->first();

        if($project) {
            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'Ok',
                'results' => $project
            ]);
        }
        else {
            return response()->json([
                'code' => 404,
                'success' => false,
                'message' => 'project not found',
            ]);
        }
    }
}
