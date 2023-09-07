<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeriodeModel;
use App\Models\User;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PeriodeController extends Controller
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
        $periode = PeriodeModel::OrderBy('tahun', 'asc')->paginate($pagination);
        $periode = PeriodeModel::OrderBy('tahun', 'asc')->get();
        return view('periode.index', ['periode'=>$periode])->with('i', ($request->input('page',1)-1)* $pagination);
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
        $periode = PeriodeModel::all();
        return view('periode.create',['users'=> User::all()], compact('periode'));

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
            'tahun' => 'required|integer',
            'mulai' => 'required|date_format:Y-m-d\TH:i',
            'selesai' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|String',
        ];

        $validateData = $request->validate($arrayValidation);

        //data insert isian utama
        $dataInsert = [
            //'id_periode' => Auth::id(),
            'id_users' => Auth::id(),
            'tahun' => $request->input('tahun'),
            'mulai' => $request->input('mulai'),
            'selesai' => $request->input('selesai'),
            'status' => $request->input('status'),
        ];
        if($request->input('status')=='1'){
            PeriodeModel::where('status', '1')->update(['status'=>'0']);
        }
        $periode = PeriodeModel::create ($dataInsert);
        
        return redirect()->route('periode.index')->with('success', 'Data berhasil disimpan');

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
    public function edit(PeriodeModel $periode)
    {
        $this->authorize('is_admin');
        $users = User::get();
        return view('periode.edit',compact(['users', 'periode']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodeRequest $request, PeriodeModel $periode)
    {  

    // $data=$request->all();
    $this->authorize('is_admin');
    $arrayValidation = [
        'tahun' => 'required|integer',
        'mulai' => 'required|date_format:Y-m-d\TH:i',
        'selesai' => 'required|date_format:Y-m-d\TH:i',
        'status' => 'required|String',
    ];

    $validateData = $request->validate($arrayValidation);

    //data insert isian utama
    $dataUpdate = [
        //'id_periode' => Auth::id(),
        'id_users' => Auth::id(),
        'tahun' => $request->input('tahun'),
        'mulai' => $request->input('mulai'),
        'selesai' => $request->input('selesai'),
        'status' => $request->input('status'),
    ];
    if($request->input('status')=='1'){
        PeriodeModel::where('status', '1')->update(['status'=>'0']);
    }
    $periode->update($dataUpdate);
    return redirect()->route('periode.index')->with('success', 'data berhasil disimpan!');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriodeModel $periode)
    {
        $this->authorize('is_admin');
        $periode->delete($periode->id);
        return redirect()->route('periode.index')->with('success', 'data berhasil dihapus!');
    }

    public function changeStatus(Request $request)
        {
            $this->authorize('is_admin');
            $periode = PeriodeModel::find($request->id);
            $periode->status = $request->status;
            $periode->save();
      
            return response()->json(['success'=>'Status change successfully.']);
        }
}
