@extends('layout-admin.main')


@section('navbar')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h4 pt-1 pb-1 mb-0 text-gray-800 text-center bg-blue shadow">{{ $indikator->nama_indikator }}</h1>
<!-- DataTales Example -->
<div class="card2 shadow mb-4">
    <div class="card-body">
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <p class=" mb-0 text-gray-800">Detail Form</p>
      <a href="{{url()->previous()}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Kembali</a>
    </div>
    <hr>
    <div class="row">
    <div class="col-6 col-sm-3">Domain</div>
    <div class="col-6 col-sm-3">{{ $indikator->domain->deskripsi }}</div>
    </div>
    <hr>
    <div class="row">
    <div class="col-6 col-sm-3">Aspek</div>
    <div class="col-6 col-sm-3">{{ $indikator->aspek->deskripsi }}</div>
    </div>
    <hr>
    <div class="row">
    <div class="col-6 col-sm-3">Indikator</div>
    <div class="col-6 ">{{ $indikator->deskripsi }}</div>
    </div>
    <hr>
    
    <div class="mb-3 mt-4">
        <button  onclick="myFunction3()" class="btn btn-primary btn-sm mb-3"> Penjelasan Indikator </button>
        <div id="myDIV3">
        <p class=" mb-0 text-gray-800">{!!  ( $indikator->penjelasan_indikator ) !!}</p>
    </div>
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
    
    <form method="post" action="{{ route('penilaian.update', $indikator->id) }}" enctype= multipart/form-data>
  @method ('PUT')
    @csrf
    <input name="id_indikator" type="hidden" value="{{ (!empty($indikator->id) ? $indikator->id: '') }}">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <thead>
                        <th>Tingkat</th>
                        <th>Kriteria</th>
                        <th>Capaian Tahun 2022</th>
                        <th>Capaian</th>
                </thead>
            </tr>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $indikator->kriteria1}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria1"
                        placeholder="Jawaban" name="uraian_kriteria1" value = "{{ (!empty($dataJawaban->uraian_kriteria1) ? $dataJawaban->uraian_kriteria1 : '') }}" required>
                        @error('uraian_kriteria1')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }} </strong>
                        </span >
                        @enderror
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "1"   {{ ($dataJawaban && $dataJawaban->level_terpilih_eksternal == '1' ? 'checked' : '') }}></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "1"  {{ ($dataJawaban && $dataJawaban->level_terpilih_eksternal == '1' ? 'checked' : '') }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $indikator->kriteria2}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria2"
                        placeholder="Jawaban" name="uraian_kriteria2" value = "{{ (!empty($dataJawaban ->uraian_kriteria2) ? $dataJawaban->uraian_kriteria2 : '') }}">
                        @error('uraian_kriteria2')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }} </strong>
                        </span >
                        @enderror
                            </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "2" {{ ($dataJawaban && $dataJawaban->level_terpilih_eksternal == '2' ? 'checked' : '')}}></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "2" {{ ($dataJawaban && $dataJawaban->level_terpilih_internal == '2' ? 'checked' : '')}}></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $indikator->kriteria3}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria3"
                        placeholder="Jawaban" name="uraian_kriteria3" value = "{{ (!empty($dataJawaban ->uraian_kriteria3) ? $dataJawaban->uraian_kriteria3 : '') }}">
                        @error('uraian_kriteria3')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }} </strong>
                        </span >
                        @enderror
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "3" {{ ($dataJawaban && $dataJawaban->level_terpilih_eksternal == '3' ? 'checked' : '')}}></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "3" {{ ($dataJawaban&& $dataJawaban->level_terpilih_internal == '3' ? 'checked' : '')}}></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $indikator->kriteria4}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria4"
                        placeholder="Jawaban" name="uraian_kriteria4" value = "{{ (!empty($dataJawaban ->uraian_kriteria4) ? $dataJawaban->uraian_kriteria4 : '') }}">
                        @error('uraian_kriteria4')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }} </strong>
                        </span >
                        @enderror
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal"  value = "4" {{ ($dataJawaban && $dataJawaban->level_terpilih_eksternal == '4' ? 'checked' : '')}}></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "4" {{($dataJawaban && $dataJawaban->level_terpilih_internal == '4' ? 'checked' : '') }}></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $indikator->kriteria5}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria5"
                        placeholder="Jawaban" name="uraian_kriteria5" value = "{{ (!empty($dataJawaban->uraian_kriteria5) ? $dataJawaban->uraian_kriteria5 : '') }}">
                        @error('uraian_kriteria5')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }} </strong>
                        </span >
                        @enderror
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "5" {{ ($dataJawaban && $dataJawaban->level_terpilih_eksternal == '5' ? 'checked' : '')}}></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "5" {{ ($dataJawaban&& $dataJawaban->level_terpilih_internal == '5' ? 'checked' : '')}}></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="nama_file[]" class="myfrm form-control">
      <div class="input-group-btn"> 
        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
      </div>
    </div>
    <div class="clone hide">
      <div class="hdtuto control-group lst input-group" style="margin-top:10px">
        <input type="file" name="nama_file[]" class="myfrm form-control">
        <div class="input-group-btn"> 
          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
        </div>
      </div>
    </div>
    <div class="text-center mb-5 mt-5">
            <button type="submit" class="btn btn-primary">Unggah dan Simpan</button>
          </div>
        </div> 
    </div>
</div>
</form>

            
@endsection