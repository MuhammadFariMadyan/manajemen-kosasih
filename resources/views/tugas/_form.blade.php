<div class="form-group {!! $errors->has('petugas') ? 'has-error' : '' !!}">
{!! Form::label('petugas', 'Petugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('petugas',$petugas, null,  array('class' => 'form-control')) !!}

{!! $errors->first('petugas', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
{!! Form::label('judul', 'Judul Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('judul', null, ['class'=>'form-control']) !!}
{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
{!! Form::label('deskripsi', 'deskripsi Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('deskripsi', null, ['class'=>'form-control']) !!}
{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
{!! Form::label('deadline', 'deadline Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('deadline', null, ['class'=>'form-control datepicker']) !!}
{!! $errors->first('deadline', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {!! $errors->has('kategori_id') ? 'has-error' : '' !!}">
{!! Form::label('kategori_id', 'Kategori', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('kategori_id',$kategori, null,  array('class' => 'form-control')) !!}

{!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
{!! Form::label('foto', 'Foto Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
@if (isset($tugas) && $tugas->foto)
<p>
{!! Html::image(asset('img/'.$tugas->foto), null, ['class'=>'img-rounded img-responsive']) !!}
</p>
@endif
{!! Form::file('foto') !!}
{!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
</div>



<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
