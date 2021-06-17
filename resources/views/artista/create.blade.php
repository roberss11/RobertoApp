
<form action="{{ url('/artista') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('/artista.form',['modo'=>'Crear']);

</form>