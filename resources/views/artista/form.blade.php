<body style="background-color: #E5A2A2; ">
<h1> {{ $modo }} Artista </h1>

@if(count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
    <ul>
    @foreach( $errors->all() as $error)
      <li>  {{ $error }} </li>
    @endforeach
    </ul>
    </div>

@endif

<div class="form-group">
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($artista->Nombre)?$artista->Nombre:'' }}" id="Nombre">
</div>


<div class="form-group">
<label for="Apellido"> Apellido </label>
<input type="text" class="form-control" name="Apellido" value="{{ isset($artista->Apellido)?$artista->Apellido:'' }}" id="Apellido">
</div>

<div class="form-group">
<label for="Nombre" class="form-label">Banda</label>
 <select class="form-select" name="banda_id" id="banda_id" class="border-light">
   @foreach ($bandas as $banda)
 <option value="{{$banda->id}}" id="banda_id">{{$banda->Nombre}}</option>
   @endforeach
</select>
</div>

<div class="form-group">
<label for="Edad"> Edad </label>
<input type="number" class="form-control" name="Edad" value="{{ isset($artista->Edad)?$artista->Edad:'' }}" id="Edad">
</div>

<div class="form-group">
<label for="Nacionalidad"> Nacionalidad </label>
<input type="text" class="form-control" name="Nacionalidad" value="{{ isset($artista->Nacionalidad)?$artista->Nacionalidad:'' }}" id="Nacionalidad">
</div>

<div class="form-group">
<label for="Tipo"> Tipo </label>
<input type="text" class="form-control" name="Tipo" value="{{ isset($artista->Tipo)?$artista->Tipo:'' }}" id="Tipo">
</div>

<div class="form-group">
<label for="GeneroMusical"> Género musical </label>
<input type="text" class="form-control" name="GeneroMusical" value="{{ isset($artista->GeneroMusical)?$artista->GeneroMusical:'' }}" id="GeneroMusical">
</div>

<div class="form-group">
<label for="Foto"></label>
@if(isset($artista->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$artista->Foto  }}" width="100" alt="">
@endif
<input type="file" class="form-group" name="Foto" value="" id="Foto">
</div>

<input class="btn btn-warning" type="submit" value="{{ $modo }} datos">

<a class="btn btn-danger" href="{{ url('artista/') }}"> Volver </a>

<br>
</body>