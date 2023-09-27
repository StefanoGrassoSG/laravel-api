<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class PrivateController extends Controller
{
    public function dashboard() {

       $projects = Project::count();
       $types = Type::count();
       $technologies = Technology::count();

        return view('admin.dashboard', compact('projects', 'types', 'technologies'));
    }
}
