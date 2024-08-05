<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        // $projects = Project::all();


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

    // public function show(String $project)
    // {

        
    // }
}
