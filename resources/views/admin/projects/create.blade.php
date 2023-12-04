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

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title">Nome progetto</label>
          <input type="text" placeholder="Nome progetto" class="form-control" name="title">
        </div>

        <label for="type_id">Tipo</label>
        <select class="form-select" name="type_id">
            <option selected>Scegli il tipo</option>

            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach


          </select>

          <div class="mb-3 my-3">
            <label for="image" class="form-label">Imagine</label>
            <input class="form-control" type="file" id="image" name="image">
          </div>


        <div class="form-floating my-5">

            <label for="explanation">Descrizione</label>
            <textarea
            class="form-control"
            name="explanation"
            placeholder="Descrizione"
            >
           </textarea>


        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
      </form>


@endsection
