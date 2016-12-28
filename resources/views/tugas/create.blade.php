@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/tugas') }}">tugas</a></li>
<li class="active">Tambah tugas</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah tugas</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('tugas.store'),
'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
@include('tugas._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
