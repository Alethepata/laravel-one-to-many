@extends('layouts.admin')

@section('content')
    <h1>Tipi</h1>

    <div class="table_container w-50">

        @if ($errors->any())

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                @endforeach
            </ul>

          </div>
        @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
        @elseif (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
        @endif


        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Aggiungi" name="name">
                <button class="btn btn-outline-success" type="submit" id="button-addon2">Aggiungi</button>
            </div>
        </form>

        <table class="table my-3">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                   <tr>
                     <td>{{$type->id}}</td>

                     <td>
                        <form action="{{route('admin.types.update', $type)}}" method="post" id="edit-{{$type->id}}">
                            @csrf
                            @method('PUT')

                            <input type="text" class="hidden border-0" value="{{ $type->name }}" name="name" />

                        </form>
                    </td>

                     <td>
                        <button onclick="submit({{$type->id}})" class="btn btn-outline-warning" id="button-addon2">
                            <i class="fa-solid fa-pencil"></i>
                        </button>

                        @include('admin.partials.delete', [
                            'route' => route('admin.types.destroy', $type),
                            'message' => "Sei sicuro di voler eliminare ?"
                        ])

                    </td>
                   </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <script>
        function submit(id){
            const form =document.getElementById('edit-'+id)
            form.submit();
        }
    </script>

@endsection
