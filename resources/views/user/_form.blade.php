<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-6">
{!! Form::text('name', null, ['class'=>'form-control']) !!}
{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
{!! Form::label('email', 'Email', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-6">
{!! Form::text('email', null, ['class'=>'form-control']) !!}
{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
</div> 

<div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}" >
    {!! Form::label('jabatan', 'jabatan', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('jabatan', ['1'=>'Admin','0'=>'Member'], null, ['class'=>'form-control js-selectize', 'placeholder' => 'Pilih jabatan'
                ]) !!}
        {!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('otoritas') ? ' has-error' : '' }}" >
    {!! Form::label('otoritas', 'Otoritas', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('otoritas', []+App\Otoritas::pluck('otoritas','id')->all(), null, ['class'=>'form-control js-selectize', 'placeholder' => 'Pilih otoritas'
                ]) !!}
        {!! $errors->first('otoritas', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>