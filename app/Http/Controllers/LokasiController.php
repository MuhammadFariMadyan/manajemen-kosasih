<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $lokasi = Lokasi::all();


            return Datatables::of($lokasi)->addColumn('action', function($lokasi){
                 $id_user = Auth::user()->id;
            return view('lokasi._action', 
            [
            'edit_url' => route('lokasi.edit', $lokasi->id),
        
            'hapus_url' => route('lokasi.destroy',$lokasi->id),
            'model' => $lokasi,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'lokasi', 'name'=>'lokasi', 'title'=>'Lokasi'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Created At'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

return view('lokasi.index')->with(compact('html'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('lokasi.create');
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
        'lokasi' => 'required|unique:lokasis,lokasi',
        ]);

         Lokasi::create(['lokasi' => $request->lokasi]);

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menyimpan Lokasi $request->lokasi "
    ]);
         return redirect('/tracking/lokasi');
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
        $lokasi = Lokasi::find($id);

        return view('lokasi.edit',['lokasi' => $lokasi]);
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
        'lokasi' => 'required|unique:lokasis,lokasi,'. $id
        ]);

         Lokasi::find($id)->update(['lokasi' => $request->lokasi]);

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil merubah Lokasi $request->lokasi "
    ]);


         return redirect('/tracking/lokasi');
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
      $lokasi =  Lokasi::find($id);

        Lokasi::destroy($id);
           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus lokasi $lokasi->nama "
    ]);

         return redirect('/tracking/lokasi');
    }
}
