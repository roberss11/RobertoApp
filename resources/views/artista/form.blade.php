<h1> {{ $modo }} Artista </h1>
<label for="Nombre"> Nombre </label>
<input type="text" name="Nombre" value="{{ isset($artista->Nombre)?$artista->Nombre:'' }}" id="Nombre">
<br>
<label for="Apellido"> Apellido </label>
<input type="text" name="Apellido" value="{{ isset($artista->Apellido)?$artista->Apellido:'' }}" id="Apellido">
<br>
<label for="Edad"> Edad </label>
<input type="number" name="Edad" value="{{ isset($artista->Edad)?$artista->Edad:'' }}" id="Edad">
<br>
<label for="Nacionalidad"> Nacionalidad </label>
<input type="text" name="Nacionalidad" value="{{ isset($artista->Nacionalidad)?$artista->Nacionalidad:'' }}" id="Nacionalidad">
<br>
<label for="Tipo"> Tipo </label>
<input type="text" name="Tipo" value="{{ isset($artista->Tipo)?$artista->Tipo:'' }}" id="Tipo">
<br>
<label for="GeneroMusical"> Género musical </label>
<input type="text" name="GeneroMusical" value="{{ isset($artista->GeneroMusical)?$artista->GeneroMusical:'' }}" id="GeneroMusical">
<br>
<label for="Foto"> Foto </label>
@if(isset($artista->Foto))
<img src="{{ asset('storage').'/'.$artista->Foto  }}" width="100" alt="">
@endif
<input type="file" name="Foto" value="" id="Foto">
<br>
<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('artista/') }}"> Volver </a>

<br>