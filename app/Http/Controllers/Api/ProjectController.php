<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects= Project::with("tecnologies","type")->paginate(3);
        $response = [
            "success"=> true,
            "results" => $projects,
        ];
        return response()->json($response);
    }
    public function show($id) {
        $projects= Project::with("tecnologies","type")->find($id);
        $response = [
            "success"=> true,
            "results" => $projects,
        ];
        return response()->json($response);
    }
    public function totProjects(){

        $projectsNum = Project::all()->count();
        $response = [
            "success" => true,
            "results" => $projectsNum
        ];
        return response()->json($response);
    }
}
