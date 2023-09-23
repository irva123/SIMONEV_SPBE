<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeriodeModel;
use App\Models\ProgressModel;
use App\Models\IndikatorModel;
use App\Models\DomainModel;
use App\Models\TrJawabanInternalModel;
use App\Models\TrDataDukungModel;
use App\Models\AspekModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateJawabanInternalRequest;

class PenilaianEksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
    //     $periodeAktif->when($request->id, function ($query) use ($request) {
    //         return $query->where('id', $request('id'))->get();
    //     });
        $periode = PeriodeModel::get();

        return view('tampilan_eksternal.penilaian1', compact('periode'))
        ->with('i', ($request->input('page',1)-1)* $pagination);
    }

    public function index2(Request $request, PeriodeModel $periode, $id)
    {
        $pagination = 10;
    //     $periodeAktif->when($request->id, function ($query) use ($request) {
    //         return $query->where('id', $request('id'))->get();
    //     });
        // $users = DB::table('users')
        // ->join('role', 'users.id_role', '=', 'role.id')
        // ->leftjoin('opd', 'users.id_opd', '=', 'opd.id')
        // ->select('users.*', 'role.nama_role', 'opd.nama_opd')
        // ->where('id_role', '2')
        // ->OrderBy('username', 'asc')
        // ->get();
        $progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')
        ->where('periode.status', '1')
        ->select('progress.*', 'periode.tahun')
        ->OrderBy('progress.created_at', 'desc')->get();

        $indikator2 = IndikatorModel::get();

        $periode = periodeModel::find($id);
        return view('tampilan_eksternal.penilaianeks2', ['domain'=>DomainModel::all(), 'aspek'=>AspekModel::all(), 'periode'=>$periode, 'indikator2'=>$indikator2, 'progress'=>$progress])->with('i', ($request->input('page',1)-1)* $pagination);
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
    public function edit(IndikatorModel $indikator, $id, TrJawabanInternalModel $dataJawaban, TrDataDukungModel $dataDukung)
    {
        $dataJawaban = TrJawabanInternalModel::where('id_indikator', $id)->get()->first();
        //dd($dataJawaban);
        $dataDukung = TrDataDukungModel::where('id_indikator', $id)->get();
        //dd($dataDukung);
        $indikator = IndikatorModel::find($id);
        return view('tampilan_eksternal.penilaianeks3',['indikator'=>$indikator, 'dataJawaban'=>$dataJawaban, 'dataDukung'=>$dataDukung]);
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

//     public function jawaban2(Request $request)
// {
//     $id = $request->input('id_indikator');
//     $dataJawaban = TrJawabanInternalModel::where('id_indikator', $id)->first();
//     //dd($dataJawaban);
//     $arrayValidation1 = [
//         'id_indikator' => 'string',
//         'level_terpilih_internal' => 'numeric',
//         'level_terpilih_eksternal' => 'numeric',
//         'uraian_kriteria1' => 'string',
//         'uraian_kriteria2' => 'string',
//         'uraian_kriteria3' => 'string',
//         'uraian_kriteria4' => 'string',
//         'uraian_kriteria5' => 'string',
//     ];

//     $validateData = $request->validate($arrayValidation1);

//     $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

//     $dataInsert = [
//         'id_periode' => $periode_aktif,
//         'id_indikator' => $request->input('id_indikator'),
//         'level_terpilih_internal' => $request->input('level_terpilih_internal'),
//         'level_terpilih_eksternal' => $request->input('level_terpilih_eksternal'),
//         'uraian_kriteria1' => $request->input('uraian_kriteria1'),
//         'uraian_kriteria2' => $request->input('uraian_kriteria2'),
//         'uraian_kriteria3' => $request->input('uraian_kriteria3'),
//         'uraian_kriteria4' => $request->input('uraian_kriteria4'),
//         'uraian_kriteria5' => $request->input('uraian_kriteria5'),
//         'uraian_eksternal' => $request->input('uraian_eksternal'),
//         'id_user_internal' => Auth::id(),
//         'id_user_eksternal' => Auth::id(),
//     ];

//         // Jika data sudah ada, jalankan update
//         $dataJawaban->update($dataInsert);
//         //dd($dataJawaban);
//             return redirect()->route('penilaian_eks.index')->with('success', 'Data berhasil disimpan');

//     //Validasi input
//     $validatedData = $request->validate([
//         'id_indikator' => 'string',
//         'level_terpilih_internal' => 'numeric',
//         'level_terpilih_eksternal' => 'numeric',
//         'uraian_kriteria1' => 'string',
//         'uraian_kriteria2' => 'string',
//         'uraian_kriteria3' => 'string',
//         'uraian_kriteria4' => 'string',
//         'uraian_kriteria5' => 'string',
//         'uraian_eksternal' => 'string',
//     ]);
// }

public function jawaban2(Request $request)
{
    $id = $request->input('id_indikator');
    $dataJawaban = TrJawabanInternalModel::where('id_indikator', $id)->first();

    $arrayValidation1 = [
        'level_terpilih_eksternal' => 'numeric',
    ];

    $validateData = $request->validate($arrayValidation1);

    $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

    $dataInsert = [
        'id_periode' => $periode_aktif,
        'id_indikator' => $request->input('id_indikator'),
        'level_terpilih_eksternal' => $request->input('level_terpilih_eksternal'),
        'uraian_eksternal' => $request->input('uraian_eksternal'),
        'id_user_internal' => Auth::id(),
        'id_user_eksternal' => Auth::id(),
    ];

    if ($dataJawaban) {
        // Jika data sudah ada, jalankan update
        $dataJawaban->update($dataInsert);
            return redirect()->route('penilaian_eks.index')->with('success', 'Data berhasil disimpan');

    } else {
        // Jika data belum ada, jalankan create
        $TrJawabanInternal = TrJawabanInternalModel::insertGetId($dataInsert);

    }

    return redirect()->route('penilaian_eks.index')->with('success', 'Data berhasil disimpan');
}

}
