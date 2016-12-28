

<a href="{{ $detail_url }}">Detail</a>
@if($model->menugaskan == $id_user)
{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}

<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

@endif
