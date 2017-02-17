<div class="form-group{{ $errors->has('otoritas') ? ' has-error' : '' }}">
{!! Form::label('otoritas', 'Nama Otoritas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('otoritas', null, ['class'=>'form-control']) !!}
{!! $errors->first('otoritas', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
