<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeriodeModel;
use App\Models\ProgressModel;
use App\Models\User;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
        //$progress = ProgressModel::OrderBy('created_at', 'desc')->paginate($pagination);
        //$progress = ProgressModel::Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->OrderBy('created_at', 'desc')->paginate($pagination);
        $progress = ProgressModel::Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->OrderBy('progress.created_at', 'desc')->paginate($pagination);
        //$progress = DB::table('progress')->join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->get();
      
        //$progress = ProgressModel::get();
        return view('progress.index', ['progress'=>$progress])->with('i', ($request->input('page',1)-1)* $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progress = ProgressModel::all();
        return view('progress.create',['users'=> User::all(), 'periode'=> PeriodeModel::all()], compact('progress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayValidation = [
            'nama_progress' => 'required|String',
            'mulai' => 'required|date_format:Y-m-d\TH:i',
            'selesai' => 'required|date_format:Y-m-d\TH:i',
        ];
        
        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
       
        //$periodeAktif = PeriodeModel::with('periode')->where('status', '"1"')->get();
        
        //data insert isian utama
        $dataInsert = [
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_progress' => $request->input('nama_progress'),
            'mulai' => $request->input('mulai'),
            'selesai' => $request->input('selesai'),
        ];
        
        $progress = ProgressModel::create ( $dataInsert);
        return redirect()->route('progress.index',['nama_progress'=>$request->input('nama_progress')])->with('success', 'Data berhasil disimpan');

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
    public function edit(ProgressModel $progress)
    {
        $users = User::get();
        return view('progress.edit',compact(['users', 'progress']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgressRequest $request, ProgressModel $progress)
    {
        //$data=$request->all();
        $arrayValidation = [
            'nama_progress' => 'required|String',
            'mulai' => 'required|date_format:Y-m-d\TH:i',
            'selesai' => 'required|date_format:Y-m-d\TH:i',
        ];
        
        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
       
        //$periodeAktif = PeriodeModel::with('periode')->where('status', '"1"')->get();
        
        //data insert isian utama
        $dataUpdate = [
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_progress' => $request->input('nama_progress'),
            'mulai' => $request->input('mulai'),
            'selesai' => $request->input('selesai'),
        ];
        
        $progress->update($dataUpdate);
        return redirect()->route('progress.index')->with('success', 'data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgressModel $progress)
    {
        $progress->delete($progress->id);
        return redirect()->route('progress.index')->with('success', 'data berhasil dihapus!');
    }
}
