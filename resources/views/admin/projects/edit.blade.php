@extends('layouts.admin')

@section('content')

    @if ($errors->any())

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
            @endforeach
        </ul>

      </div>

    @endif

    <form action="{{route('admin.projects.update', $project )}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Nome progetto</label>
          <input type="text" placeholder="Nome progetto" class="form-control" name="title" value="{{old('name', $project->title)}}">
        </div>

        <div class="form-floating my-5">
            <textarea
            class="form-control"
            name="explanation"
            placeholder="Descrizione"
            >
            {{old('explanation', $project->explanation)}}
           </textarea>
            <label for="explanation">Descrizione</label>

        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
      </form>



@endsection
