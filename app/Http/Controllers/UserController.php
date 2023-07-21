<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$this->authorize('is_admin');
        //if(Gate::denies('is_OPD')) {
        
        $pagination = 10;
        // $periode = periodeModel::all()->OrderBy('tahun', 'asc');
        $users = User::OrderBy('username', 'asc')->paginate($pagination);
        $users = User::OrderBy('username', 'asc')->get();
        return view('user.index', ['users'=>$users])->with('i', ($request->input('page',1)-1)* $pagination);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('user.create',['users'=> User::all()], compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->authorize('is_admin');
        $arrayValidation = [
            'username' => 'required|String',
            'password' => 'required|String',
            'nama_lengkap' => 'required|String',
            'nip' => 'required|String',
            'email' => 'required|String',
            'no_hp' => 'required|String',
            'role' => 'required|String',
        ];
        
        $validateData = $request->validate($arrayValidation);
       
        //$periodeAktif = PeriodeModel::with('periode')->where('status', '"1"')->get();
        
        //data insert isian utama
        $dataInsert = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'nip' => $request->input('nip'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'role' => $request->input('role'),
        ];
        
        $users = User::create ( $dataInsert);
        return redirect()->route('user.index',['username'=>$request->input('username')])->with('success', 'Data berhasil disimpan');

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
    public function edit(User $users)
    {
        //$this->authorize('is_admin');
        $users = User::get();
        return view('user.edit',compact(['users']));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $users)
    {
        //$this->authorize('is_admin');
        //$data=$request->all();
        $arrayValidation = [
            'username' => 'required|String',
            'password' => 'required|String',
            'nama_lengkap' => 'required|String',
            'nip' => 'required|String',
            'email' => 'required|String',
            'no_hp' => 'required|String',
            'role' => 'required|String',
        ];
        
        $validateData = $request->validate($arrayValidation);
       
        //$periodeAktif = PeriodeModel::with('periode')->where('status', '"1"')->get();
        
        //data insert isian utama
        $dataUpdate = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'nip' => $request->input('nip'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'role' => $request->input('role'),
        ];
        
        $users->update($dataUpdate);
        return redirect()->route('user.index')->with('success', 'data berhasil disimpan!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        //$this->authorize('is_admin');
        $users->delete($users->id);
        return redirect()->route('user.index')->with('success', 'data berhasil dihapus!');
    }    
}