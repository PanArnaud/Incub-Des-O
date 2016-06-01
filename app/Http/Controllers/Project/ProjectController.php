<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Project;
use App\City;
use App\Rate;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProjectFormRequest;

class ProjectController extends Controller
{
   public function all(Project $project) 
   {
   		$projects = $project->paginate(5);

   		return view('projects.index')->withProjects($projects);
   }

   public function show($id, Project $project)
   {
   		$show = $project->where('id', $id)->firstOrFail();                      
   		return view('projects.show')->withProject($show)->withProgress(56); //edit progress
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
            'introduction' => $request->input('introduction'),
   			'city_id' => $request->input('city_id')
   		]);

         notify()->flash('Publié !', 'success', [
            'text' => 'Votre projet a été publié avec succès !',
            'timer' => 2000,
        ]);

         return redirect()->route('project.show')->withProject($project)->withProgress(56); //edit progress
   }

   // Edit view

   // Edit function

   // Delete function

   public function rate(Request $request)
   {
      $project_id = $request->input('project_id');
      $rate = $request->input('rate');

      $project = Project::find($project_id);
      if(!$project) {
         return null;
      }

      $user = Auth::user();
      $rateSource = $user->rates()->where('project_id', $project_id)->first();
      if($rateSource){
         if($rateSource->rate != $rate) {
            $rateSource->rate = $rate;
            $rateSource->update();
         }else{
            return null;
         }
      }else{
         $newRate = new Rate();
         $newRate->user_id = $user->id;
         $newRate->project_id = $project->id;
         $newRate->rate = $rate;
         $newRate->save();
      }

      return null;
   }
}
