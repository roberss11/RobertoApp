@extends('layouts.app')

@section('content')
<body  style="background-image: url(imagenes/FondoArtistas.jpg);">
<div class="container">

@if(Session::has('mensaje'))
 <div class="alert alert-success alert-dismissible" role="alert">

  {{ Session::get('mensaje') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
   <span aria-hidden="true">&times;</span>
  </button>

 </div>
@endif

<a href="{{ url('artista/create') }}" class="btn btn-danger" style="background-color: orange"> Registrar nuevo artista </a>
</br>
</br>
<table class="table table-danger">
  <thead class="thead-light" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Banda</th>
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

      @foreach ($bandas as $banda)
      @if($banda->id===$artista->banda_id)
      <td>{{ $banda->Nombre }}</td>
      @endif
      @endforeach
      
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
</body>
@endsection