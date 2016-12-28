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
<h2 class="panel-title">Detail tugas {{ $tugas->judul }} |  deadline : {{ $tugas->deadline }} | status tugas : @if($tugas->status_tugas == 0) Belum dikerjakan @elseif($tugas->status_tugas == 1) Sedang Dikerjakan  @elseif($tugas->status_tugas == 2) Sudah Selesai Oleh Petugas @elseif($tugas->status_tugas == 3) Sudah Dikonfirmasi Oleh Pengecks @endif  </h2>
</div>
<div class="panel-body">
<p>{{ $tugas->deskripsi }}</p>


@if (isset($tugas) && $tugas->foto)
<p>
<div class="col-md-2">
	

</div>
<div class="col-md-4">{!! Html::image(asset('img/'.$tugas->foto), null, ['class'=>'img-rounded img-responsive']) !!}</div>

</p>
@endif
</div>
</div>
<!-- panel komentar -->
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Komentar</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('tugas.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('tugas._form_komentar')
{!! Form::close() !!}
</div>
</div>
<!--/ panel komentar -->

</div>
</div>
</div>
@endsection
