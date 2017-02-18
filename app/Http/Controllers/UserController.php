<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Otoritas;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $user = Users::with('otoritas');


            return Datatables::of($user)->addColumn('action', function($user){ 
            return view('user._action', 
            [
            'edit_url' => route('user.edit', $user->id),
        
            'hapus_url' => route('user.destroy',$user->id),
             'confirm_message'   => 'Yakin mau menghapus User ' . $user->name . '?',
            'model' => $user,
            ]);
             })->addColumn('jabatan', function($user){
        if($user->jabatan == 0) {
          $jabatan = "Member";
        }
        elseif($user->jabatan == 1){
   $jabatan = "Admin";
        }

        return $jabatan;
             })->addColumn('otoritas', function($user){
        if($user->otoritas == 0) {
          $otoritas = "Tidak Ada Otoritas";
        }
        elseif($user->otoritas !=0){
            $nama_otoritas = Otoritas::find($user->otoritas)->select('otoritas')->first();
   $otoritas = $nama_otoritas->otoritas;
        }

        return $otoritas;
            })->make(true);
    }


$html = $htmlBuilder

->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
->addColumn(['data' => 'otoritas', 'name'=>'otoritas', 'title'=>'Otoritas'])
->addColumn(['data' => 'jabatan', 'name'=>'jabatan', 'title'=>'Jabatan'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Created At'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

return view('user.index')->with(compact('html'));
} 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
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
        $user = Users::find($id);
        return view('user.edit')->with(compact('user')); 
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'. $id , 
            'jabatan' => 'required',
            'otoritas' => 'required'  
        ]);

 
         $user = Users::find($id)->update([
            'name' => $request->name,
            'email' => $request->email, 
            'jabatan' => $request->jabatan,
            'otoritas' => $request->otoritas]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"berhasil Memngubah User $request->name"
            ]);
        return redirect()->route('user.index');
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
         if(!Users::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"User berhasil dihapus"
            ]);
        return redirect()->route('user.index');
            }
    }
}