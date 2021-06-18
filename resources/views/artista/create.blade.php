@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/artista') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('/artista.form',['modo'=>'Crear'])

</form>
</div>
@endsection