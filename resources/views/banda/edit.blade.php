@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/banda/'.$banda->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('banda.form',['modo'=>'Editar'])

</form>
</div>
@endsection