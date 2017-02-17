@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/lokasi') }}">lokasi</a></li>
<li class="active">Tambah lokasi</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah lokasi</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('lokasi.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('lokasi._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
