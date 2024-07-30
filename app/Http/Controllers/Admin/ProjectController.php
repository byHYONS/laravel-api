<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //? passo le types della tabella relazionata:
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

        //* $img_path = Storage::put('upload', $data['image']); SENZA CONDIZIONE
        //* $img_path = $request->hasFile('image') ? $request->image->store('uploads') : NULL; UN ALTRO MODO PER SCRIVERE CON OPERATORE TERNARIO
        
        $img_path = $request->hasFile('image') ? Storage::put('upload', $data['image']) : null;

        $project = new Project();

        $project->fill($data);

        $slug = Str::of($project->title)->slug('-');

        $project->slug = $slug;
        $project->image = $img_path;

        //? aggiungo select della tabella relazionata types:
        $project->type_id = $data['type_id'];

        // if (isset($data['technology_id']) && is_array($data['technology_id'])) {
            // }
            
        $project->save();
            
            
        //? aggiungo select della tabella relazionata Technologies:
        if ($request->has('technologies')) {
       
            $technologyData = array_fill_keys($data['technologies'], ['create_at' => now(), 'updated_at' => now()]);
            $project->technologies()->attach($technologyData);
        }

        return redirect()->route('admin.projects.show', $project);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // $project->load('technologies');
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //? passo le types della tabella relazionata:
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        //? per non sovrascrivere l'immagine in caso non venga caricata un'altra immagine:
        if ($request->hasFile('image')) {

            $img_path = Storage::put('upload', $request->file('image'));
            $data['image'] = $img_path;
        }
  
        $project->update($data); //* va dopo l'aggiornamento slug se no devo inserire anche il save()

        $slug = Str::of($project->title)->slug('-');

        $project->slug = $slug;

        //? aggiungo select della tabella relazionata types:
        $project->type_id = $data['type_id'];

        // if (isset($data['technology_id']) && is_array($data['technology_id'])) {
        // }
        
        $project->save();

        //? aggiungo select della tabella relazionata Technologies:
        if ($request->has('technologies')) {
       
            $technologyData = array_fill_keys($data['technologies'], ['updated_at' => now()]);
            $project->technologies()->sync($technologyData);
        }

        return redirect()->route('admin.projects.show', $project);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        //? cancelliamo eventuali relazioni in caso di cancellazione progetto:
        $project->technologies()->detach();

        $project->delete();

        //? se associata un immagine al progetto cancellato, cancella anche l'immagine:
        if($project->image) {
            Storage::delete($project->image);
        }

        return redirect()->route('admin.projects.index');

    }
}
