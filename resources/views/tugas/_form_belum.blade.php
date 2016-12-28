<div class="form-group{{ $errors->has('masalah') ? ' has-error' : '' }}">
{!! Form::label('masalah', 'Hal Yang Belum Selesai', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('masalah', null, ['class'=>'form-control']) !!}
{!! $errors->first('masalah', '<p class="help-block">:message</p>') !!}
</div>
</div>


{!! Form::hidden('tugas_id', $value  = $tugas->id, ['class'=>'form-control']) !!}


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Kirim', ['class'=>'btn btn-primary']) !!}
</div>
</div>
