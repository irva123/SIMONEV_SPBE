<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AspekModel;
use App\Models\DomainModel;
use App\Models\PeriodeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateAspekRequest;
use App\Models\User;


class AspekController extends Controller
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
        //$aspek = AspekModel::OrderBy('created_at', 'asc')->paginate($pagination);
        $aspek = AspekModel::Join('periode', 'aspek.id_periode', '=', 'periode.id')->where('periode.status', '1')->OrderBy('aspek.created_at', 'desc')->paginate($pagination);
        $aspek = AspekModel::OrderBy('nama_aspek', 'asc')->get();
        return view('aspek.index', ['aspek'=>$aspek])->with('i', ($request->input('page',1)-1)* $pagination);
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
        return view('aspek.create',['users'=> User::all()], compact('domain', 'aspek'));
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
            'nama_aspek' => 'required|String',
            'id_domain' => 'required|String',
        ];

        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

        //data insert isian utama
        $dataInsert = [
            //'id_periode' => Auth::id(),
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_aspek' => $request->input('nama_aspek'),
            'id_domain' => $request->input('id_domain'),
        ];

        $aspek = AspekModel::create ($dataInsert);
        
        return redirect()->route('aspek.index')->with('success', 'Data berhasil disimpan');
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
    public function edit(AspekModel $aspek)
    {
        $users = User::get();
        $domain = DomainModel::all();
        return view('aspek.edit',compact(['users', 'aspek', 'domain']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAspekRequest $request, AspekModel $aspek)
    {
        $arrayValidation = [
            'nama_aspek' => 'required|String',
            'id_domain' => 'required|String',
        ];
    
        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
    
        //data insert isian utama
        $dataUpdate = [
            //'id_periode' => Auth::id(),
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_aspek' => $request->input('nama_aspek'),
            'id_domain' => $request->input('id_domain'),
        ];

        $aspek->update($dataUpdate);
        return redirect()->route('aspek.index')->with('success', 'data berhasil disimpan!');
        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspekModel $aspek)
    {
        $aspek->delete($aspek->id);
        return redirect()->route('aspek.index')->with('success', 'data berhasil dihapus!');
    }
}
