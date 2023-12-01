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

        <label for="type_id">Tipo</label>
        <select class="form-select" name="type_id">
            <option>Scegli il tipo</option>

            @foreach ($types as $type)
                <option value="{{$type->id}}" @if ($type->id === old('type_id', $project?->type?->id)) selected @endif>{{$type->name}}</option>
            @endforeach

          </select>

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
