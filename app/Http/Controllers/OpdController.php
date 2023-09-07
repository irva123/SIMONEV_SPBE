<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndikatorModel;
use App\Models\AspekModel;
use App\Models\DomainModel;
use App\Models\PeriodeModel;
use App\Models\OpdModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateOpdRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class OpdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     //$this->authorize('is_admin');
     if(Gate::denies('is_OPD')) {
        
        $pagination = 10;
        // $periode = periodeModel::all()->OrderBy('tahun', 'asc');
        $opd = opdModel::OrderBy('id', 'asc')->paginate($pagination);
        $opd = opdModel::OrderBy('id', 'asc')->get();
        return view('opd.index', ['opd'=>$opd])->with('i', ($request->input('page',1)-1)* $pagination);
    }
}
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_admin');
        $opd = OpdModel::all();
        return view('opd.create',['users'=> User::all()], compact('opd'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('is_admin');
        $arrayValidation = [
            'nama_opd' => 'required|String',
        ];

        $validateData = $request->validate($arrayValidation);

        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

        //data insert isian utama
        $dataInsert = [
            //'id_periode' => Auth::id(),
            'id_users' => Auth::id(),
            'nama_opd' => $request->input('nama_opd'),
        ];

        $opd = OpdModel::create ($dataInsert);
        
        return redirect()->route('opd.index')->with('success', 'Data berhasil disimpan');

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
    public function edit(OpdModel $opd)
    {
        $this->authorize('is_admin');
        $users = User::get();
        return view('opd.edit',compact(['users', 'opd']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpdRequest $request, OpdModel $opd)
    {
        $arrayValidation = [
            'nama_opd' => 'required|String',
        ];
    
        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
    
        //data insert isian utama
        $dataUpdate = [
            //'id_periode' => Auth::id(),
            'id_users' => Auth::id(),
            'nama_opd' => $request->input('nama_opd'),
        ];

        $opd->update($dataUpdate);
        return redirect()->route('opd.index')->with('success', 'data berhasil disimpan!');
        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpdModel $opd)
    {
        $this->authorize('is_admin');
        $opd->delete($opd->id);
        return redirect()->route('opd.index')->with('success', 'data berhasil dihapus!');
    }

    public function changeStatus(Request $request)
        {
            $this->authorize('is_admin');
            $opd = OpdModel::find($request->id);
            $opd->status = $request->status;
            $opd->save();
      
            return response()->json(['success'=>'Status change successfully.']);
        }
}