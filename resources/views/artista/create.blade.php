
formulario creacion artistas

<form action="{{ url('/artista') }}" method="post" enctype="multipart/form-data" >
@csrf

<label for="Nombre"> Nombre </label>
<input type="text" name="Nombre" id="Nombre">
<br>
<label for="Apellido"> Apellido </label>
<input type="text" name="Apellido" id="Apellido">
<br>
<label for="Edad"> Edad </label>
<input type="number" name="Edad" id="Edad">
<br>
<label for="Nacionalidad"> Nacionalidad </label>
<input type="text" name="Nacionalidad" id="Nacionalidad">
<br>
<label for="Tipo"> Tipo </label>
<input type="text" name="Tipo" id="Tipo">
<br>
<label for="GeneroMusical"> Género musical </label>
<input type="text" name="GeneroMusical" id="GeneroMusical">
<br>
<label for="Foto"> Foto </label>
<input type="file" name="Foto" id="Foto">
<br>

<input type="submit" value="Guardar datos">
<br>
</form>