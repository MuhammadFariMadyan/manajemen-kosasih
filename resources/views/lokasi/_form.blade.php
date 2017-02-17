<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
{!! Form::label('lokasi', 'Nama Lokasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('lokasi', null, ['class'=>'form-control']) !!}
{!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
