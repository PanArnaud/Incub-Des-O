<?php

namespace App\Http\Controllers\Topic;

use Illuminate\Http\Request;

use App\Project;
use App\Topic;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Topic\CreateTopicFormRequest;

class TopicController extends Controller
{
	public function create($id, Project $project)
	{
		$project = $project->find($id);

		return view('projects.topics.create')->withProject($project)->withProgress(56);
	}

	public function store($id, CreateTopicFormRequest $request, Project $project) 
	{
		$project = $project->findOrFail($id);
		$topic = $request->user()->topics()->create([
			'title' => $request->input('title'),
			'body' => $request->input('body'),
			'project_id' => $project->id,
		]);

		notify()->flash('Publiée !', 'success', [
            'text' => 'Votre discussion a été publiée avec succès !',
            'timer' => 2000,
        ]);

		return redirect()->route('project.topic.show', ['id' => $project->id, 'topic_id' => $topic->id])->withProgress(56);
	}

	public function show($id, $topic_id, Topic $topic, Project $project) 
	{
		$topic = $topic->findOrFail($topic_id);
		$project = $project->findOrFail($id);
		
		return view('projects.topics.show')->withProject($project)->withTopic($topic)->withProgress(50);
	}
}
