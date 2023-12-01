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

    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title">Nome progetto</label>
          <input type="text" placeholder="Nome progetto" class="form-control" name="title">
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
