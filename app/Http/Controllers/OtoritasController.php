<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Otoritas;

class OtoritasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $otoritas = Otoritas::all();


            return Datatables::of($otoritas)->addColumn('action', function($otoritas){
                 $id_user = Auth::user()->id;
            return view('otoritas._action', 
            [
            'edit_url' => route('otoritas.edit', $otoritas->id),
        
            'hapus_url' => route('otoritas.destroy',$otoritas->id),
            'model' => $otoritas,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'otoritas', 'name'=>'otoritas', 'title'=>'Otoritas'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Created At'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

return view('otoritas.index')->with(compact('html'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('otoritas.create');
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
        'otoritas' => 'required|unique:otoritas,otoritas',
        ]);

         Otoritas::create(['otoritas' => $request->otoritas]);

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menyimpan Otoritas $request->otoritas "
    ]);
         return redirect('/tracking/otoritas');
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
        $otoritas = Otoritas::find($id);

        return view('otoritas.edit',['otoritas' => $otoritas]);
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
        'otoritas' => 'required|unique:otoritas,otoritas,'. $id
        ]);

         Otoritas::find($id)->update(['otoritas' => $request->otoritas]);

          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil merubah Otoritas $request->otoritas "
    ]);


         return redirect('/tracking/otoritas');
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
      $otoritas =  otoritas::find($id);

        Otoritas::destroy($id);
           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus Otoritas $otoritas->nama "
    ]);

         return redirect('/tracking/otoritas');
    }
}
