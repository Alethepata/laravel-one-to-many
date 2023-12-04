@extends('layouts.admin')

@section('content')

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    <h1>Progetto : {{$project->title}}</h1>

    @if ($project->type)
        <p>Tipo : {{$project->type->name}}</p>
    @endif

    @if ($project->image)
        <img src="{{asset('storage/' . $project->image)}}" alt="">
    @endif

    <p>Progetto iniziato il : {{$project->start_date }} </p>

    @if ($project->end_date)
        <p>Progetto finito il :{{$project->end_date }}</p>
    @else
        <p>In corso</p>
    @endif

    <p>Descrizione : {{$project->explanation}}</p>


    <a class="btn btn-outline-warning" href="{{route('admin.projects.edit', $project )}}"><i class="fa-solid fa-pen-to-square"></i></a>

    @include('admin.partials.delete', [
         'route' => route('admin.projects.destroy', $project),
         'message' => "Sei sicuro di voler eliminare ?"
     ])



@endsection
