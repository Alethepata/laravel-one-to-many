<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(5);;
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $form_data['slug'] = Project::generateSlug($form_data['title']);
        $form_data['start_date'] = date('Y-m-d');

        $new_project = new Project();
        if(array_key_exists('image', $form_data) && $form_data['image']!= ""){


            $form_data['image_name'] = $request->file('image')->getClientOriginalName();

            $form_data['image'] = Storage::put('uploads', $form_data['image']);

        }

        $new_project->fill($form_data);


        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project)->with('success', 'Aggiunto correttamente');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $form_data = $request->all();


        if($project->title === $form_data['title']){
            $form_data['slug'] = $project->slug;
        }else{
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project)->with('success', 'Aggiornato correttamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Eliminato correttamente');
    }
}
