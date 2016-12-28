@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/kategori') }}">Kategori</a></li>
<li class="active">Ubah Kategori</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Kategori</h2>
</div>
<div class="panel-body">
{!! Form::model($kategori, ['url' => route('kategori.update', $kategori->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('kategori._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection