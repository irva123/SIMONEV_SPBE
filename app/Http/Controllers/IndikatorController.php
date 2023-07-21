<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndikatorModel;
use App\Models\AspekModel;
use App\Models\DomainModel;
use App\Models\PeriodeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateIndikatorRequest;
use App\Models\User;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
        // $periode = periodeModel::all()->OrderBy('tahun', 'asc');
        //$indikator = IndikatorModel::OrderBy('created_at', 'asc')->paginate($pagination);
        $indikator = IndikatorModel::Join('periode', 'indikator.id_periode', '=', 'periode.id')->where('periode.status', '1')->OrderBy('indikator.created_at', 'desc')->paginate($pagination);
        $indikator = IndikatorModel::OrderBy('id_domain', 'asc')->get();
        return view('indikator.index', ['indikator'=>$indikator])->with('i', ($request->input('page',1)-1)* $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domain = DomainModel::all();
        $aspek = AspekModel::all();
        $indikator = IndikatorModel::all();
        return view('indikator.create',['users'=> User::all()], compact('domain', 'aspek', 'indikator'));
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
            'nama_indikator' => 'required|String',
            'bobot_nilai' => 'required|numeric',
            'id_domain' => 'required|String',
            'id_aspek' => 'required|String',
        ];

        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

        //data insert isian utama
        $dataInsert = [
            //'id_periode' => Auth::id(),
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_indikator' => $request->input('nama_indikator'),
            'bobot_nilai' => $request->input('bobot_nilai'),
            'id_domain' => $request->input('id_domain'),
            'id_aspek' => $request->input('id_aspek'),
        ];

        $indikator = IndikatorModel::create ($dataInsert);
        
        return redirect()->route('indikator.index')->with('success', 'Data berhasil disimpan');
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
    public function edit(IndikatorModel $indikator)
    {
        $users = User::get();
        $domain = DomainModel::all();
        $aspek = AspekModel::all();
        return view('indikator.edit',compact(['users', 'indikator', 'domain', 'aspek']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndikatorRequest $request, IndikatorModel $indikator)
    {
        $arrayValidation = [
            'nama_indikator' => 'required|String',
            'bobot_nilai' => 'required|numeric',
            'id_domain' => 'required|String',
            'id_aspek' => 'required|String',
        ];
    
        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
    
        //data insert isian utama
        $dataUpdate = [
            //'id_periode' => Auth::id(),
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_indikator' => $request->input('nama_indikator'),
            'bobot_nilai' => $request->input('bobot_nilai'),
            'id_domain' => $request->input('id_domain'),
            'id_aspek' => $request->input('id_aspek'),
        ];

        $indikator->update($dataUpdate);
        return redirect()->route('indikator.index')->with('success', 'data berhasil disimpan!');
        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndikatorModel $indikator)
    {
        $indikator->delete($indikator->id);
        return redirect()->route('indikator.index')->with('success', 'data berhasil dihapus!');
    }
}
