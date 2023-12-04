@extends('layouts.admin')

@section('content')
    <h1>Progetti</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <table class="table my-3">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Iniziato</th>
            <th scope="col">Finito</th>
            <th scope="col">Tipo</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
               <tr>
                 <td>{{$project->id}}</td>
                 <td>{{$project->title}}</td>
                 <td>{{$project->start_date }}</td>

                 @if ($project->end_date)
                    <td>{{$project->end_date }}</td>
                @else
                    <td>In corso</td>
                 @endif

                 <td>{{$project->type->name }}</td>
                 <td><a class="btn btn-success" href="{{route('admin.projects.show', $project)}}">Show</a></td>
               </tr>
            @endforeach

        </tbody>
      </table>
      {{$projects->links()}}

@endsection
