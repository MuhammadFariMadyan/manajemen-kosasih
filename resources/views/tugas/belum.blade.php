@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/tugas') }}">Tugas</a></li>
<li class="active">Tugas Belum Selesai</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tugas Belum Selesai</h2>
</div>
<div class="panel-body">
{!! Form::model($tugas, ['url' => route('tugas.belum-update', $tugas->id),
'method'=>'put','files'=>'true', 'class'=>'form-horizontal']) !!}
@include('tugas._form_belum')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection