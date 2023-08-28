<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DomainModel;
use App\Models\PeriodeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateDomainRequest;


class DomainController extends Controller
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
        //$domain = DomainModel::OrderBy('created_at', 'asc')->paginate($pagination);
        $domain = DomainModel::Join('periode', 'domain.id_periode', '=', 'periode.id')->where('periode.status', '1')->OrderBy('domain.created_at', 'desc')->paginate($pagination);
        $domain = DomainModel::OrderBy('nama_domain', 'asc')->get();
        return view('domain.index', ['domain'=>$domain])->with('i', ($request->input('page',1)-1)* $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domain = DomainModel::all();
        return view('domain.create',['users'=> User::all()], compact('domain'));
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
            'nama_domain' => 'required|String',
            'deskripsi' => 'required|String',
            'bobot_nilai' => 'required|numeric',
        ];

        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

        //data insert isian utama
        $dataInsert = [
            //'id_periode' => Auth::id(),
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_domain' => $request->input('nama_domain'),
            'deskripsi' => $request->input('deskripsi'),
            'bobot_nilai' => $request->input('bobot_nilai'),
        ];

        $domain = DomainModel::create ($dataInsert);
        
        return redirect()->route('domain.index')->with('success', 'Data berhasil disimpan');

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
    public function edit(DomainModel $domain)
    {
        $users = User::get();
        return view('domain.edit',compact(['users', 'domain']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDomainRequest $request, DomainModel $domain)
    {
        $arrayValidation = [
            'nama_domain' => 'required|String',
            'deskripsi' => 'required|String',
            'bobot_nilai' => 'required|numeric',
        ];
    
        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
    
        //data insert isian utama
        $dataUpdate = [
            //'id_periode' => Auth::id(),
            'id_periode' => $periode_aktif,
            'id_users' => Auth::id(),
            'nama_domain' => $request->input('nama_domain'),
            'deskripsi' => $request->input('deskripsi'),
            'bobot_nilai' => $request->input('bobot_nilai'),
        ];

        $domain->update($dataUpdate);
        return redirect()->route('domain.index')->with('success', 'data berhasil disimpan!');
        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainModel $domain)
    {
        $domain->delete($domain->id);
        return redirect()->route('domain.index')->with('success', 'data berhasil dihapus!');
    }
}
