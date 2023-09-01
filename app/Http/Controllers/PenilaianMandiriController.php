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
use App\Http\Requests\UpdateJawabanInternalRequest;

class PenilaianMandiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     dd($request->input('tahun'));
    $periodeAktif = PeriodeModel::paginate(10);
        return view('tampilan_opd.penilaian1', ['periodeaktif'=>$periodeAktif]);
        $periodeAktif = PeriodeModel::query();
        $pagination = 10;
        $periodeAktif->when($request->tahun, function ($query) use ($request) {
            return $query->where($request->tahun);
        });
        // $filtertahun = (!empty($request->input('tahun')) ? $request->input('tahun') : date("Y"));
        // $periode = PeriodeModel::all();
        // $periodeAktif=PeriodeModel::where('tahun', $filtertahun)->get();
        //$progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->select('progress.*', 'periode.tahun')->OrderBy('progress.created_at', 'desc')->paginate($pagination);
        return view('tampilan_opd.penilaian1', [ 'periodeaktif'=>$periodeAktif])->with('i', ($request->input('page',1)-1)* $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pagination = 10;
        $progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')
        ->where('periode.status', '1')
        ->select('progress.*', 'periode.tahun')
        ->OrderBy('progress.created_at', 'desc')->get();

        //Tambah pengecekan role user, jika role opd filter berdasarkan id opd, jika tidak tampil semua
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
        $arrayValidation = [
            'id_periode' => 'required|String',
            'id_indikator' => 'required|String',
            'level_terpilih_internal' => 'required|numeric',
            'level_terpilih_eksternal' => 'numeric',
            'uraian_kriteria1' => 'required|String',
            'uraian_kriteria2' => 'required|String',
            'uraian_kriteria3' => 'required|String',
            'uraian_kriteria4' => 'required|String',
            'uraian_kriteria5' => 'required|String',
            'id_user_internal' => 'required|String',
            'id_user_eksternal' => 'String',
            'uraian_eksternal' => 'String',
        ];

        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

        //data insert isian utama
        $dataInsert = [
            'id_periode' => $periode_aktif,
            'id_indikator' => Auth::id(),
            'level_terpilih_internal' => $request->input('level_terpilih_internal'),
            'level_terpilih_eksternal' => $request->input('level_terpilih_eksternal'),
            'uraian_kriteria1' => $request->input('uraian_kriteria1'),
            'uraian_kriteria2' => $request->input('uraian_kriteria2'),
            'uraian_kriteria3' => $request->input('uraian_kriteria3'),
            'uraian_kriteria4' => $request->input('uraian_kriteria4'),
            'uraian_kriteria5' => $request->input('uraian_kriteria5'),
            'id_user_internal' => Auth::id(),
            'id_user_eksternal' => Auth::id(),
            'uraian_eksternal' => $request->input('uraian_eksternal'),
        ];

        $TrJawabanInternal = TrJawabanInternalModel::create ($dataInsert);
        dd($TrJawabanInternal);
        return redirect()->route('penilaian.index')->with('success', 'Data berhasil disimpan');
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
    public function update(UpdateJawabanInternalRequest $request, TrJawabanInternalModel $TrJawabanInternal)
    {
        
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
