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
    <form method="post" action="/penilaian" enctype= multipart/form-data>
    @csrf
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
                            placeholder="Jawaban" name="uraian_kriteria1" required autofocus value = "{{ old('uraian_kriteria1') }}">
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "1"></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "1"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $indikator->kriteria2}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria2"
                            placeholder="Jawaban" name="uraian_kriteria2" required autofocus value = "{{ old('uraian_kriteria2') }}">
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "2"></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "2"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $indikator->kriteria3}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria3"
                            placeholder="Jawaban" name="uraian_kriteria3" required autofocus value = "{{ old('uraian_kriteria3') }}">
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "3"></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "3"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $indikator->kriteria4}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria4"
                            placeholder="Jawaban" name="uraian_kriteria4" required autofocus value = "{{ old('uraian_kriteria4') }}">
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal"  value = "4"></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "4"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $indikator->kriteria5}}
                        <input type="text" class="form-control form-control-user" id="uraian_kriteria5"
                            placeholder="Jawaban" name="uraian_kriteria5" required autofocus value = "{{ old('uraian_kriteria5') }}">
                        </td>
                        <td> <input type="radio" id="level_terpilih_eksternal"
                             name="level_terpilih_eksternal" value = "5"></td>
                        <td> <input type="radio" id="level_terpilih_internal"
                             name="level_terpilih_internal" value = "5"></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        </form>
    </div>
    </div>
</div>
@endsection