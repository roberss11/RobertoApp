@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/artista/'.$artista->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('artista.form',['modo'=>'Editar'])

</form>
</div>
@endsection