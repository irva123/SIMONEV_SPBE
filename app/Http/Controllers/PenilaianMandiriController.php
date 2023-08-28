<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeriodeModel;
use App\Models\ProgressModel;
use App\Models\IndikatorModel;
use App\Models\DomainModel;
use App\Models\AspekModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class PenilaianMandiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
        $filtertahun = (!empty($request->input('tahun')) ? $request->input('tahun') : date("Y"));
        $periode = PeriodeModel::where('tahun', $filtertahun)->get();
        $progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->select('progress.*', 'periode.tahun')->OrderBy('progress.created_at', 'desc')->paginate($pagination);
        return view('tampilan_opd.penilaian1', ['indikator'=>IndikatorModel::all(), 'progress'=>$progress, 'periode' => $periode])->with('i', ($request->input('page',1)-1)* $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pagination = 10;
        $progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->select('progress.*', 'periode.tahun')->OrderBy('progress.created_at', 'desc')->get();
        $indikator2 = IndikatorModel::where('indikator.id_opd', Auth::user()->id_opd)->OrderBy('indikator.created_at', 'asc')->get();
        // dd($indikator2);
        return view('tampilan_opd.penilaian2', ['domain'=>DomainModel::all(), 'aspek'=>AspekModel::all(), 'indikator2'=>$indikator2, 'progress'=>$progress, 'periode' => PeriodeModel::all()])->with('i', ($request->input('page',1)-1)* $pagination);
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
    public function edit(IndikatorModel $indikator, $id)
    {
        $indikator = IndikatorModel::find($id);
        return view('tampilan_opd.penilaian3',['indikator'=>$indikator]);

        
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
    }

    public function jawaban(Request $request, $id)
    {
        $indikator2 = IndikatorModel::find($id);
        return redirect('penilaian/create');
    }
}
