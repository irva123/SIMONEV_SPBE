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
use File;

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

        $indikatorOPD = indikatorModel::where('id_opd', Auth::user()->id_opd)->get();
        // dd(Auth::user()->id_opd);
        $idIndikatorList = array();
        $jumlahtotal=0;
        foreach ($indikatorOPD as $indikatorOPD2) {
            $idIndikatorList[] = $indikatorOPD2->id;
            $jumlahtotal++;
        }


        //dd($idIndikatorList);
        $jumlahTerisi = TrJawabanInternalModel::whereIn('id_indikator', $idIndikatorList)->count();
        $progresJawaban = ($jumlahTerisi / $jumlahtotal)*100;

        // dd($progresJawaban);
        //$progress = DB::table('progress')->Join('periode', 'progress.id_periode', '=', 'periode.id')->where('periode.status', '1')->select('progress.*', 'periode.tahun')->OrderBy('progress.created_at', 'desc')->paginate($pagination);
        return view('tampilan_opd.penilaian1', compact('periode','periodeaktif', 'progresJawaban', 'jumlahTerisi',  'jumlahtotal'))
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

        $jawaban = TrJawabanInternalModel::get();
        //dd(Auth::user()->id_opd);
        $levelTerpilihList = [];
        $jumlahtotal=0;
        foreach ($jawaban  as $jawaban2) {
            $levelTerpilihList[] = $jawaban2->level_terpilih_internal;
            $jumlahtotal++;
            
        }
        dd($levelTerpilihList);

        $indikatorOPD = indikatorModel::where('id_opd', Auth::user()->id_opd)->get();
        // dd(Auth::user()->id_opd);
        $idIndikatorList = [];
        $jumlahtotal=0;
        foreach ($indikatorOPD as $indikatorOPD2) {
            $idIndikatorList[] = $indikatorOPD2->bobot_nilai;
            $jumlahtotal++;
        }
        //dd($idIndikatorList);

         //Data indikator dari tabel database (sesuaikan dengan nama tabel Anda)
        //  $indikators = indikatorModel::get();

        //  $total = 0;
 
        //  foreach ($indikators as $key => $jawaban ) {
        //      // Menggunakan nilai dari variabel yang ada di luar controller
        //      $total += ($levelTerpilihList[$key] * $idIndikatorList[$key]) / 13;
        //  }
        //dd($total);


       // dd($idIndikatorList);
        $jumlahTerisi = TrJawabanInternalModel::whereIn('id_indikator', $idIndikatorList)->count();
        $progresJawaban = ($jumlahTerisi / $jumlahtotal)*100;

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
    public function edit(IndikatorModel $indikator, $id, TrJawabanInternalModel $dataJawaban, TrDataDukungModel $dataDukung)
    {
        // $dataJawaban = DB::table('tr_jawaban_internal')
        // ->join('indikator', 'tr_jawaban_internal.id_indikator', '=', 'indikator.id')
        // ->where("tr_jawaban_internal.id_indikator", "=", $dataJawaban->id_indikator)
        // ->select('tr_jawaban_internal.*', 'indikator.nama_indikator')
        // ->get();

        // dd($id);

        $dataJawaban = TrJawabanInternalModel::where('id_indikator', $id)->get()->first();
        //dd($dataJawaban);
        $dataDukung = TrDataDukungModel::where('id_indikator', $id)->get();
        //dd($dataDukung);
        $indikator = IndikatorModel::find($id);
        return view('tampilan_opd.penilaian3',['indikator'=>$indikator, 'dataJawaban'=>$dataJawaban, 'dataDukung'=>$dataDukung]);
   
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
        // // hapus file
		// $file = TrDataDukungModel::where('id',$id)->first();
		// File::delete('images/'.$file->nama_file);
 
		// // hapus data
		// TrDataDukungModel::where('id',$id)->delete();
 
		// return redirect()->back();
    }

    // public function jawaban(Request $request)
    // {
        
    //     $id = $request->input('id_indikator');
    //     $dataJawaban = TrJawabanInternalModel::where('id_indikator', $id)->get();
    //         $arrayValidation = [
    //             'id_indikator' => 'required|String',
    //             'level_terpilih_internal' => 'required|numeric',
    //             'level_terpilih_eksternal' => 'numeric',
    //             'uraian_kriteria1' => 'required|String',
    //             'uraian_kriteria2' => 'required|String',
    //             'uraian_kriteria3' => 'required|String',
    //             'uraian_kriteria4' => 'required|String',
    //             'uraian_kriteria5' => 'required|String',
    //         ];
    
    //         $validateData = $request->validate($arrayValidation);
    //         $periode_aktif = DB::table('periode')->where('status', '1')->value('id');
    //         //dd($periode_aktif);
    //         //data insert isian utama
    //         $dataInsert = [
    //             'id_periode' => $periode_aktif,
    //             'id_indikator' => $request->input('id_indikator'),
    //             'level_terpilih_internal' => $request->input('level_terpilih_internal'),
    //             'level_terpilih_eksternal' => $request->input('level_terpilih_eksternal'),
    //             'uraian_kriteria1' => $request->input('uraian_kriteria1'),
    //             'uraian_kriteria2' => $request->input('uraian_kriteria2'),
    //             'uraian_kriteria3' => $request->input('uraian_kriteria3'),
    //             'uraian_kriteria4' => $request->input('uraian_kriteria4'),
    //             'uraian_kriteria5' => $request->input('uraian_kriteria5'),
    //             'uraian_eksternal' => '',
    //             'id_user_internal' => Auth::id(),
    //             'id_user_eksternal' => Auth::id(),
    //         ];
    //         //dd($dataInsert);
    //     if(!empty($dataJawaban)){
    //        //dd('b');
    //        $dataUpdate = [
    //         'id_periode' => $periode_aktif,
    //         'id_indikator' => $request->input('id_indikator'),
    //         'level_terpilih_internal' => $request->input('level_terpilih_internal'),
    //         'level_terpilih_eksternal' => $request->input('level_terpilih_eksternal'),
    //         'uraian_kriteria1' => $request->input('uraian_kriteria1'),
    //         'uraian_kriteria2' => $request->input('uraian_kriteria2'),
    //         'uraian_kriteria3' => $request->input('uraian_kriteria3'),
    //         'uraian_kriteria4' => $request->input('uraian_kriteria4'),
    //         'uraian_kriteria5' => $request->input('uraian_kriteria5'),
    //         'uraian_eksternal' => '',
    //         'id_user_internal' => Auth::id(),
    //         'id_user_eksternal' => Auth::id(),
    //     ];
    //     //dd($dataUpdate);
    //     $TrJawabanInternal = TrJawabanInternalModel::insertGetId ($dataUpdate);
    //     $id = $request->input('id_indikator');
    //     // $TrJawabanInternal->update($dataUpdate);
    //     // $id_jawaban = $request->input('id_jawaban');
    //     if ($request->hasfile('nama_file')) { 
    //         $files = [];
    //         foreach ($request->file('nama_file') as $file) {
    //             if ($file->isValid()) {
    //                 $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
    //                 $file->move(public_path('images'), $filename);                    
    //                 $files[] = [
    //                     'id_jawaban'=> $TrJawabanInternal,
    //                     'id_indikator' => $id,
    //                     'nama_file' => $filename,
    //                     'created_at' => \Carbon\Carbon::now(),
    //                     'updated_at' => \Carbon\Carbon::now(),
    //                 ];
    //             }
    //         }
    //     }
    //     $TrJawabanInternal->update($dataUpdate);
    //     return redirect()->route('penilaian.index')->with('success', 'data berhasil disimpan!'); 
     
    //     }else{
    //         //dd('a');
    //         $TrJawabanInternal = TrJawabanInternalModel::insertGetId ($dataInsert);

    //         $arrayValidation2 = [
    //             'id_jawaban' => 'String',
    //             'nama_file' => 'required',
    //         ];
    
    //         $validateData = $request->validate($arrayValidation2);
    //         //$lastId = $TrJawabanInternal->value('id');
    //         if ($request->hasfile('nama_file')) { 
    //             $files = [];
    //             foreach ($request->file('nama_file') as $file) {
    //                 if ($file->isValid()) {
    //                     $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
    //                     $file->move(public_path('images'), $filename);                    
    //                     $files[] = [
    //                         'id_jawaban'=>$TrJawabanInternal,
    //                         'nama_file' => $filename,
    //                         'created_at' => \Carbon\Carbon::now(),
    //                         'updated_at' => \Carbon\Carbon::now(),
    //                     ];
    //                 }
    //             }
    //         }

    //         $TrDataDukung = TrDataDukungModel::insert ($files);
    //         return redirect()->route('tampilan_opd.penilaian2')->with('success', 'Data berhasil disimpan');
    //     }
    // }

    
public function jawaban(Request $request)
{
    $id = $request->input('id_indikator');
    $dataJawaban = TrJawabanInternalModel::where('id_indikator', $id)->first();

    $arrayValidation1 = [
        'id_indikator' => 'required|string',
        'level_terpilih_internal' => 'required|numeric',
        'level_terpilih_eksternal' => 'numeric',
        'uraian_kriteria1' => 'required|string',
        'uraian_kriteria2' => 'required|string',
        'uraian_kriteria3' => 'required|string',
        'uraian_kriteria4' => 'required|string',
        'uraian_kriteria5' => 'required|string',
    ];

    $validateData = $request->validate($arrayValidation1);

    $periode_aktif = DB::table('periode')->where('status', '1')->value('id');

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

    if ($dataJawaban) {
        // Jika data sudah ada, jalankan update
        $dataJawaban->update($dataInsert);
        $arrayValidation2 = [
            'id_jawaban' => '',
            'nama_file' => '',
        ];

        $validateData = $request->validate($arrayValidation2);
        $id = $request->input('id_indikator');
        if ($request->hasfile('nama_file')) { 
            $files = [];
            foreach ($request->file('nama_file') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('images'), $filename);                    
                    $files[] = [
                        'id_jawaban' => $dataJawaban->id,
                        'id_indikator' => $id,
                        'nama_file' => $filename,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' =>  \Carbon\Carbon::now(),
                    ];
                }
            }
            
        }
        $TrDataDukung = TrDataDukungModel::insert($files);
            return redirect()->route('penilaian.index')->with('success', 'Data berhasil disimpan');

    } else {
        // Jika data belum ada, jalankan create
        $TrJawabanInternal = TrJawabanInternalModel::insertGetId($dataInsert);

        $arrayValidation2 = [
            'id_jawaban' => '',
            'nama_file' => 'required',
        ];

        $validateData = $request->validate($arrayValidation2);
        $id = $request->input('id_indikator');
        if ($request->hasfile('nama_file')) { 
            $files = [];
            foreach ($request->file('nama_file') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('images'), $filename);                    
                    $files[] = [
                        'id_jawaban' => $TrJawabanInternal,
                        'id_indikator' => $id,
                        'nama_file' => $filename,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' =>  \Carbon\Carbon::now(),
                    ];
                }
            }
            
        }
        $TrDataDukung = TrDataDukungModel::insert($files);
            return redirect()->route('penilaian.index')->with('success', 'Data berhasil disimpan');

    }

    return redirect()->route('penilaian.index')->with('success', 'Data berhasil disimpan');
}
}