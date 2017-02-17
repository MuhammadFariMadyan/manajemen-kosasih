@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/lokasi') }}">Lokasi</a></li>
<li class="active">Ubah Lokasi</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Lokasi</h2>
</div>
<div class="panel-body">
{!! Form::model($lokasi, ['url' => route('lokasi.update', $lokasi->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('lokasi._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection