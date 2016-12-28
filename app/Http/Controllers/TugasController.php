<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Kategori;
use App\Tugas;
use App\User;
use File;
class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $tugas = Tugas::with(['kategori','petugas','menugaskan']);


            return Datatables::of($tugas)->addColumn('action', function($tugas){
                 $id_user = Auth::user()->id;
            return view('tugas._action', 
            [
             'detail_url' => route('tugas.show', $tugas->id),
            'edit_url' => route('tugas.edit', $tugas->id),
        
            'hapus_url' => route('tugas.destroy',$tugas->id),
            'model' => $tugas,
            'id_user' => $id_user,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul Tugas'])
->addColumn(['data' => 'petugas.name', 'name'=>'petugas.name', 'title'=>'Petugas'])
->addColumn(['data' => 'menugaskan.name', 'name'=>'menugaskan.name', 'title'=>'Menugaskan'])
->addColumn(['data' => 'deadline', 'name'=>'deadline', 'title'=>'Deadline'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Created At'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

return view('tugas.index')->with(compact('html'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

 $kategori = Kategori::all()->pluck('nama', 'id');

 $petugas = User::all()->pluck('name', 'id');

 return view('tugas.create',['kategori' => $kategori,'petugas' => $petugas]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

            $this->validate($request, [
        'judul' => 'required',
        'deskripsi' => 'required',
        'petugas' => 'required',
        'deadline' => 'required',
        'kategori_id' => 'required',
        'foto' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

    $id_user = Auth::user()->id;

        $tugas =  Tugas::create(['judul' => $request->judul,'deskripsi' => $request->deskripsi,'petugas' => $request->petugas,'menugaskan' =>   $id_user,'deadline' => date('Y-m-d',strtotime($request->deadline)),'kategori_id' => $request->kategori_id]);

         // isi field cover jika ada cover yang diupload
        if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_foto = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_foto->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan cover ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_foto->move($destinationPath, $filename);
        // mengisi field cover di book dengan filename yang baru dibuat
        $tugas->foto = $filename;
        $tugas->save();
        }

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Membuat Tugas "
    ]);


         return redirect('/tracking/tugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $tugas = Tugas::find($id);

        return view('tugas.detail',['tugas' => $tugas ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


 $kategori = Kategori::all()->pluck('nama', 'id');

 $petugas = User::all()->pluck('name', 'id');
 $tugas = Tugas::find($id);

 return view('tugas.edit',['kategori' => $kategori,'petugas' => $petugas,'tugas'=> $tugas]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

            $this->validate($request, [
        'judul' => 'required',
        'deskripsi' => 'required',
        'petugas' => 'required',
        'deadline' => 'required',
        'kategori_id' => 'required',
        'foto' => 'image'
        ]);

    $id_user = Auth::user()->id;

         $tugas = Tugas::find($id)->update(['judul' => $request->judul,'deskripsi' => $request->deskripsi,'petugas' => $request->petugas,'menugaskan' =>   $id_user,'deadline' => date('Y-m-d',strtotime($request->deadline)),'kategori_id' => $request->kategori_id]);
$tugas = Tugas::find($id);
          if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_foto = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_foto->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan cover ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_foto->move($destinationPath, $filename);


        // hapus cover lama, jika ada
        if ($tugas->foto) {
        $old_foto = $tugas->foto;
        $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
        . DIRECTORY_SEPARATOR . $tugas->foto;
        try {
        File::delete($filepath);
        } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
        }
        }
        // mengisi field cover di book dengan filename yang baru dibuat
        $tugas->foto = $filename;
        $tugas->save();
        }

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Mengubah Tugas $request->judul  "
    ]);


         return redirect('/tracking/tugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
$tugas = Tugas::find($id);
        Tugas::destroy($id);

                  Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus Tugas $tugas->judul "
    ]);


         return redirect('/tracking/tugas');


    }

     public function komentar(Request $request)
    {

    }


}
