@extends('layouts.app')

@section('title', 'Les projets')

@section('content')
	@foreach($projects as $project)
		{{ $project->title }}
	@endforeach
@endsection