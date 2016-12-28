<div class="form-group{{ $errors->has('isi_komentar') ? ' has-error' : '' }}">
{!! Form::label('isi_komentar', 'Komentar', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('isi_komentar', null, ['class'=>'form-control']) !!}
{!! $errors->first('isi_komentar', '<p class="help-block">:message</p>') !!}
</div>
</div>


{!! Form::hidden('tugas_id', $value  = $tugas->id, ['class'=>'form-control']) !!}


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Kirim', ['class'=>'btn btn-primary']) !!}
</div>
</div>
