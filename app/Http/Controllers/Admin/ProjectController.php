<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\http\controllers\Controller;

//models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;


//requests
use App\http\Requests\Project\StoreProjectRequest;
use App\http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();

        return view('admin.projects.index', compact('projects', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
       $formdata = $request->validated();

       $project = Project::create([
            'name' => $formdata['name'],
            'slug' => str()->slug($formdata['name']),
            'description' => $formdata['description'],
            'start_date' => $formdata['start_date'],
            'end_date' => $formdata['end_date'],
            'project_status' => $formdata['project_status'],
            'project_link' => $formdata['project_link'],
            'type_id' => $formdata['type_id']
       ]);

       if(isset($formdata['technologies'])) {
        foreach ($formdata['technologies'] as $technologyId) {
            $project->technologies()->attach($technologyId);
       }
    }
       

       return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {   
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {   
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();

        $project->update([
            'name' => $formData['name'],
            'slug' => str()->slug($formData['name']),
            'description' => $formData['description'],
            'start_date' => $formData['start_date'],
            'end_date' => $formData['end_date'],
            'project_status' => $formData['project_status'],
            'project_link' => $formData['project_link'],
            'type_id' => $formData['type_id']
        ]);

        if(isset($formData['technologies'])) {
            $project->technologies()->sync($formData['technologies']);
        }
        else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
