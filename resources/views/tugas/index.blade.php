@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Tugas</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tugas</h2>
</div>
<div class="panel-body">
 <a class="btn btn-primary" href="{{ route('tugas.create') }}">Tambah</a>  

<div class="btn-group">
  <button type="button" class="btn btn-primary">Petugas</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">  
  @foreach($petugas as $petugass)
    <li><a href="{{ route('tugas.petugas',$petugass->id) }}">{{ $petugass->name }}</a></li>
@endforeach
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-primary">Pemberi Tugas</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">  
  @foreach($menugaskan as $menugaskans)
    <li><a href="{{ route('tugas.menugaskan',$menugaskans->id) }}">{{ $menugaskans->name }}</a></li>
@endforeach
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-primary">Kategori</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">  
  @foreach($kategori as $kategoris)
    <li><a href="{{ route('tugas.kategori',$kategoris->id) }}">{{ $kategoris->nama }}</a></li>
@endforeach
  </ul>
</div> 
<div class="table-responsive">
{!! $html->table(['class'=>'table-striped table']) !!}

</div>

</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
