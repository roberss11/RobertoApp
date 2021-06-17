Mostrar lista de artistas
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
      <td>{{ $artista->Foto }}</td>
      <td>{{ $artista->Nombre }}</td>
      <td>{{ $artista->Apellido }}</td>
      <td>{{ $artista->Edad }}</td>
      <td>{{ $artista->Nacionalidad }}</td>
      <td>{{ $artista->Tipo }}</td>
      <td>{{ $artista->GeneroMusical }}</td>
      <td>Editar |
      
      <form action="{{ url('/artista/'.$artista->id )  }}" method="post">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

      </form>
      
      </td>
    </tr>
     @endforeach
  </tbody>
</table>