@extends('layouts.admin')

@section('content')

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    <h1>Progetto : {{$project->title}}</h1>
    <p>Progetto iniziato il : {{$project->start_date }} | Progetto finito il : {{$project->end_date }}</p>
    <p>Descrizione : {{$project->explanation}}</p>

    @if ($project->type)
        <p>Tipo : {{$project->type->name}}</p>
    @endif
    <a class="btn btn-outline-warning" href="{{route('admin.projects.edit', $project )}}"><i class="fa-solid fa-pen-to-square"></i></a>

   @include('admin.partials.delete', [
        'route' => route('admin.projects.destroy', $project),
        'message' => "Sei sicuro di voler eliminare ?"
    ])



@endsection
