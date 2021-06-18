@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje' )}}

@endif

<a href="{{ url('artista/create') }}" class="btn btn-success"> Registrar nuevo artista </a>
</br>
</br>
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Nacionalidad</th>
      <th scope="col">Tipo</th>
      <th scope="col">Género musical</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
     @forEach( $artistas as $artista )
    <tr>
      <td>{{ $artista->id }}</td>
      <td>
      <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$artista->Foto  }}" width="100" alt="">
      </td>
      <td>{{ $artista->Nombre }}</td>
      <td>{{ $artista->Apellido }}</td>
      <td>{{ $artista->Edad }}</td>
      <td>{{ $artista->Nacionalidad }}</td>
      <td>{{ $artista->Tipo }}</td>
      <td>{{ $artista->GeneroMusical }}</td>
      <td>

      <a href="{{ url('/artista/'.$artista->id.'/edit') }}" class="btn btn-warning">
           Editar 
      </a>
      |
      <form action="{{ url('/artista/'.$artista->id )  }}" class="d-inline" method="post">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

      </form>
      
      </td>
    </tr>
     @endforeach
  </tbody>
</table>
</div>
@endsection