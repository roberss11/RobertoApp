@extends('layouts.app')

@section('content')
<body  style="background-image: url(imagenes/FondoBandas.jpg);">
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje' )}}

@endif

<a href="{{ url('banda/create') }}" class="btn btn-danger" style="background-color: orange"> Registrar nueva Banda </a>
</br>
</br>
<table class="table table-danger">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th> 
      <th scope="col">Género musical</th>
      <th scope="col">Numero de miembros</th>
      <th scope="col">Año de fundacion</th>
      <th scope="col">Hit</th>
     
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
     @forEach( $bandas as $banda )
    <tr>
      <td>{{ $banda->id }}</td>
      <td>
      <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$banda->Foto  }}" width="100" alt="">
      </td>
      <td>{{ $banda->Nombre }}</td>
      <td>{{ $banda->GeneroMusical }}</td>
      <td>{{ $banda->NumeroMiembros }}</td>
      <td>{{ $banda->AnoFundacion }}</td>
      <td>{{ $banda->Hit }}</td>
      
      <td>

      <a href="{{ url('/banda/'.$banda->id.'/edit') }}" class="btn btn-warning">
           Editar 
      </a>
      |
      <form action="{{ url('/banda/'.$banda->id )  }}"  class="d-inline" method="post">
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