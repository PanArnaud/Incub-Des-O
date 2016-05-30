<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Project;
use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProjectFormRequest;

class ProjectController extends Controller
{
   public function all(Project $project) 
   {
   		$projects = $project->paginate(10);

   		// return view list of all project
   }

   public function show($id, Project $project)
   {
   		$show = $project->where('id', $id)->firstOrFail();
   
   		// return project view
   }

   public function create(Request $request, City $city) 
   {
   		$cities = $city->orderBy('name', 'asc')->get();
   		$id = $request['city'];

   		return view('projects.create')->withCities($cities)->withId($id);
   }

   public function store(CreateProjectFormRequest $request, Project $project)
   {
   		$project = $request->user()->projects()->create([
   			'title' => $request->input('title'),
   			'description' => $request->input('description'),
   			'city_id' => $request->input('city_id')
   		]);

   		// return the project view
   }

   // Edit view

   // Edit function

   // Delete function
}
