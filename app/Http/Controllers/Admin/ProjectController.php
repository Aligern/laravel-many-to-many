<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$projects = Project::all();
        // dd($project);
        $projects = Project::where('title', 'like', '%' . request('search') . '%')->paginate(10);
        return view('admin.projects.index', compact('projects'));
        //
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
        $data = $request->validated();
        $data['slug'] = Project::generateSlug($data['title']);

        if ($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $path = Storage::putFileAs('projects_images', $request->image, $name);
            $data['image'] = $path;
        }
        $newProject = Project::create($data);
        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }
        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //dd($project);
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
        $data = $request->all();
        if ($project->title != $data['title']) {
            $data['slug'] = Project::generateSlug($data['title']);
        }
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $name = $request->image->getClientOriginalName();
            $path = Storage::putFileAs('projects_images', $request->image, $name);
            $data['image'] = $path;
        }
        $project->update($data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        } else {
            $project->technologies()->sync([]);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' deleted!');
    }
}
