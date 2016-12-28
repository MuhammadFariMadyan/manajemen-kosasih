@if($model->petugas == $id_user AND $model->status_tugas == 0)
<a href="{{ $kerjakan_url }}" class="btn btn-primary  btn-xs ">Sedang Dikerjakan</a>
@elseif($model->petugas == $id_user AND $model->status_tugas == 1)
<a href="{{ $selesai_url }}" class="btn btn-primary  btn-xs ">Selesai Dikerjakan</a>
@elseif($model->petugas != $id_user  AND $model->status_tugas == 2)
<a href="{{ $belum_url }}" class="btn btn-warning  btn-xs ">Masih Belum Selesai</a> |
<a href="{{ $konfirmasi_url }}" class="btn btn-success  btn-xs ">Konfirmasi Pekerjaan</a>
@endif
<a href="{{ $detail_url }}">Detail</a>
@if($model->menugaskan == $id_user)
{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}


<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

@endif
