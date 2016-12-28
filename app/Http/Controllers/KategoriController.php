<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $kategori = Kategori::all();


            return Datatables::of($kategori)->addColumn('action', function($kategori){
                 $id_user = Auth::user()->id;
            return view('kategori._action', 
            [
            'edit_url' => route('kategori.edit', $kategori->id),
        
            'hapus_url' => route('kategori.destroy',$kategori->id),
            'model' => $kategori,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Kategori'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Created At'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

return view('kategori.index')->with(compact('html'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view ('kategori.create');
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
        'nama' => 'required|unique:kategoris,nama',
        ]);

         Kategori::create(['nama' => $request->nama]);

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menyimpan kategori $request->nama "
    ]);


         return redirect('/tracking/kategori');
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

        $kategori = Kategori::find($id);

        return view('kategori.edit',['kategori' => $kategori]);
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
        'nama' => 'required|unique:kategoris,nama,'. $id
        ]);

         Kategori::find($id)->update(['nama' => $request->nama]);

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil merubah kategori $request->nama "
    ]);


         return redirect('/tracking/kategori');
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
      $kategori =  Kategori::find($id);

        Kategori::destroy($id);
           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus kategori $kategori->nama "
    ]);

         return redirect('/tracking/kategori');
    }
}
