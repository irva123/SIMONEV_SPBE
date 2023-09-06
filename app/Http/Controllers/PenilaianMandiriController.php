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

class PenilaianMandiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    // //     dd($request->input('tahun'));
    // $periodeAktif = PeriodeModel::paginate(10);
    // return view('tampilan_opd.penilaian1', ['periodeaktif'=>$periodeAktif]);
    //     $periodeAktif = PeriodeModel::Query();
    $pagination = 10;
    //     $periodeAktif->when($request->id, function ($query) use ($request) {
    //         return $query->where('id', $request('id'))->get();
    //     });
        $periode = PeriodeModel::get();
        //$periodeaktif = DB::table('periode')->where('status', '1')->value('id');

    //     $periodeaktif = PeriodeModel::where( function($query) use($request){
    //         return $request->tahun ?
    //                $query->from('periode')->where('tahun',$request->tahun) : '';
    //    })->get();
        $filtertahun = (!empty($request->input('tahun')) ? $request->input('tahun') : date("Y"));
        // $periode = PeriodeModel::all();
        $periodeaktif=PeriodeModel::where('tahun', $filtertahun)->get();
        //$progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->select('progress.*', 'periode.tahun')->OrderBy('progress.created_at', 'desc')->paginate($pagination);
        return view('tampilan_opd.penilaian1', compact('periode','periodeaktif'))
        ->with('i', ($request->input('page',1)-1)* $pagination);
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

    public function jawaban(Request $request)
    {
        $arrayValidation = [
            'id_indikator' => 'required|String',
            'level_terpilih_internal' => 'required|numeric',
            'level_terpilih_eksternal' => 'numeric',
            'uraian_kriteria1' => 'required|String',
            'uraian_kriteria2' => 'required|String',
            'uraian_kriteria3' => 'required|String',
            'uraian_kriteria4' => 'required|String',
            'uraian_kriteria5' => 'required|String',
        ];

        $validateData = $request->validate($arrayValidation);
        $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

        //data insert isian utama
        $dataInsert = [
            'id_periode' => $periode_aktif,
            'id_indikator' => $request->input('id_indikator'),
            'level_terpilih_internal' => $request->input('level_terpilih_internal'),
            'level_terpilih_eksternal' => $request->input('level_terpilih_eksternal'),
            'uraian_kriteria1' => $request->input('uraian_kriteria1'),
            'uraian_kriteria2' => $request->input('uraian_kriteria2'),
            'uraian_kriteria3' => $request->input('uraian_kriteria3'),
            'uraian_kriteria4' => $request->input('uraian_kriteria4'),
            'uraian_kriteria5' => $request->input('uraian_kriteria5'),
            'uraian_eksternal' => '',
            'id_user_internal' => Auth::id(),
            'id_user_eksternal' => Auth::id(),
        ];

        $TrJawabanInternal = TrJawabanInternalModel::insertGetId ($dataInsert);
        
        $arrayValidation2 = [
            'id_jawaban' => 'String',
            'nama_file' => 'required',
        ];

        $validateData = $request->validate($arrayValidation2);
        //$lastId = $TrJawabanInternal->value('id');
        if ($request->hasfile('nama_file')) { 
            $files = [];
            foreach ($request->file('nama_file') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                    $file->move(public_path('images'), $filename);                    
                    $files[] = [
                        'id_jawaban'=>$TrJawabanInternal,
                        'nama_file' => $filename,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ];
                }
            }
       

        $TrDataDukung = TrDataDukungModel::insert ($files);
       //dd($TrDataDukung);

        return redirect()->route('penilaian.index')->with('success', 'Data berhasil disimpan');
    }
}
}