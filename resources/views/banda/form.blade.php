<body style="background-color: #E5A2A2; ">
<h1> {{ $modo }} Banda </h1>

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
<input type="text" class="form-control" name="Nombre" value="{{ isset($banda->Nombre)?$banda->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
<label for="GeneroMusical"> Género musical </label>
<input type="text" class="form-control" name="GeneroMusical" value="{{ isset($banda->GeneroMusical)?$banda->GeneroMusical:old('GeneroMusical')  }}" id="GeneroMusical">
</div>

<div class="form-group">
<label for="NumeroMiembros"> Numero de miembros </label>
<input type="number" class="form-control" name="NumeroMiembros" value="{{ isset($banda->NumeroMiembros)?$banda->NumeroMiembros:old('NumeroMiembros')  }}" id="NumeroMiembros">
</div>

<div class="form-group">
<label for="AnoFundacion"> Año de fundación </label>
<input type="number" class="form-control" name="AnoFundacion" value="{{ isset($banda->AnoFundacion)?$banda->AnoFundacion:old('AnoFundacion')  }}" id="AnoFundacion">
</div>

<div class="form-group">
<label for="Hit"> Hit </label>
<input type="text" class="form-control" name="Hit" value="{{ isset($banda->Hit)?$banda->Hit:old('Hit')  }}" id="Hit">
</div>

<div class="form-group">
<label for="Foto"></label>
@if(isset($banda->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$banda->Foto  }}" width="100" alt="">
@endif
<input type="file" class="form-group" name="Foto" value="" id="Foto">
</div>

<input class="btn btn-warning" type="submit" value="{{ $modo }} datos">

<a class="btn btn-danger" href="{{ url('banda/') }}"> Volver </a>

<br>
</body>