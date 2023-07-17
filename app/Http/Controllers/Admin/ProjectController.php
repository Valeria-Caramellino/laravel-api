<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= Type::all();
        $tecnologies = Tecnology::all();

        return view("admin.projects.create", compact('types','tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //dump($request->all());
        $data = $request->validated();
        //dump($data);

        if($request->hasFile("image")) {

            $img_path = Storage::put("uploads", $data['image']);

            $data['image'] = $img_path;
        }
        //dump($data['image']);
        
        $newProject = new Project();

        $newProject->fill($data);

        $newProject->save();
        //dump($newProject);

        $newProject->tecnologies()->attach($data["tecnologies"]);

        return to_route("admin.project.show" , $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types= Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.edit', compact('project','types','tecnologies'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
       

        $img_path = Storage::put("uploads", $data['image']);

        $data['image'] = $img_path;
        
        
        $project->fill($data);

        $project->update();

        $project->tecnologies()->sync($data["tecnologies"]);

        return to_route("admin.project.show" , $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index');
    }
}
