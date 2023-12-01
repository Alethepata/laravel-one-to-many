@extends('layouts.admin')

@section('content')
  <h1>Elenco</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Tipo</th>
        <th scope="col">Progetto</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
             <td>{{ $type->id }}</td>
             <td>{{ $type->name }}</td>
             <td>
                <ul>
                    @foreach ($type->projects as $project)
                        <li class="list-group-item">{{ $project->title }}</li>
                    @endforeach
                </ul>
             </td>

        </tr>
        @endforeach
    </tbody>
  </table>



@endsection
