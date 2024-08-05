<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {

        // $projects = Project::all();

        //? paginazione a 6 elementi con relazione type:
        $projects = Project::with('type')->paginate(6);

        if ($projects) {
            return response()->json([
                'status' => 'success',
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'results' => null
            ], 404);
        }
    }

    public function show(String $slug)
    {
        //? dettaglio con relazione type e technologies:
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        if ($project) {
            return response()->json([
                'status' => 'success',
                'results' => $project
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'results' => null
            ], 404);
        }
        
    }
}
