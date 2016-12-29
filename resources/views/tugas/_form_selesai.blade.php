<div class="form-group{{ $errors->has('deskripsi_selesai') ? ' has-error' : '' }}">
{!! Form::label('deskripsi_selesai', 'Penjelasan mengenai yang sudah di selesaikan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('deskripsi_selesai', null, ['class'=>'form-control']) !!}
{!! $errors->first('deskripsi_selesai', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('foto_selesai') ? ' has-error' : '' }}">
{!! Form::label('foto_selesai', 'Foto selesai Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::file('foto_selesai') !!}
{!! $errors->first('foto_selesai', '<p class="help-block">:message</p>') !!}
</div>
</div>


{!! Form::hidden('tugas_id', $value  = $tugas->id, ['class'=>'form-control']) !!}


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Kirim', ['class'=>'btn btn-primary']) !!}
</div>
</div>
