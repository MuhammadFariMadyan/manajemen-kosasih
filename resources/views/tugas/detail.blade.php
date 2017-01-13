@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/tugas') }}">tugas</a></li>
<li class="active">Detail tugas</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Detail tugas {{ $tugas->judul }} |  deadline : {{ $tugas->deadline }} | status tugas : @if($tugas->status_tugas == 0) Belum dikerjakan @elseif($tugas->status_tugas == 1) Sedang Dikerjakan  @elseif($tugas->status_tugas == 2) Sudah Selesai Oleh Petugas @elseif($tugas->status_tugas == 3) Sudah Dikonfirmasi Oleh Pengecek @endif  </h2>
</div>
<div class="panel-body">
<p> Deskripsi : {{ $tugas->deskripsi }}</p>
<p>Masalah yang belum di atasi: {{ $tugas->masalah }} </p>
@if (isset($tugas) && $tugas->foto_masalah)
<p>
<div class="col-md-2">

Foto masalah Tugas: 
</div>
<div class="col-md-4">{!! Html::image(asset('img/'.$tugas->foto_masalah), null, ['class'=>'img-rounded img-responsive']) !!}</div>

</p>
@endif

@if (isset($tugas) && $tugas->foto)
<p>
<div class="col-md-2">

Foto Tugas: 
</div>
<div class="col-md-4">{!! Html::image(asset('img/'.$tugas->foto), null, ['class'=>'img-rounded img-responsive']) !!}</div>

</p>
@endif


@if (isset($tugas) && $tugas->foto_selesai)
<p>
<div class="col-md-2">
	
Foto Selesai : 
</div>
<div class="col-md-4">{!! Html::image(asset('img/'.$tugas->foto_selesai), null, ['class'=>'img-rounded img-responsive']) !!}</div>

</p>
@endif


</div>
</div>
<!-- panel form komentar -->
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Komentar</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('tugas.komentar'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('tugas._form_komentar')
{!! Form::close() !!}
</div>
</div>
<!--/ panel form komentar -->
<!-- panel  komentar -->
@foreach($komentar as $komentars)
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $komentars->user->name}}  | {{ $komentars->created_at}}</h2>
</div>
<div class="panel-body">
{{ $komentars->isi_komentar}}
</div>
</div>

@endforeach
<!-- panel  komentar -->

</div>
</div>
</div>
@endsection
