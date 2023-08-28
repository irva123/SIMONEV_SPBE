@extends('layout-admin.main')


@section('navbar')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tugas Penilaian Mandiri</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <p class=" mb-0 text-gray-800">Detail Form</p>
      <a href="{{url()->previous()}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Kembali</a>
    </div>
    <hr>
    @foreach ($progress as $progress)
    <div class="row">
    <div class="col-6 col-sm-3">Tahun</div>
    <div class="col-6 col-sm-3">{{ $progress->tahun}}</div>
    </div>
    <hr>
    <div class="row">
    <div class="col-6 col-sm-3">Nama Form</div>
    <div class="col-6 col-sm-3">{{ $progress->nama_progress}}</div>
    </div>
    <hr>
    <div class="row">
    <div class="col-6 col-sm-3">Status Evaluasi</div>
    <div class="col-6 col-sm-3">Evaluasi</div>
    </div>
    <hr>
    @endforeach
    
    <div class="mb-3 mt-4">
        <button  onclick="myFunction()" class="btn btn-primary btn-sm"> Form Pengisian Pertanyaan Umum </button>
    </div>
    <div id="myDIV">
    <p class=" mb-3 text-gray-800 text-center">Form Pengisian Pertanyaan Umum</p>
    <form method="post" action="/domain" enctype= multipart/form-data>
    @csrf
    <div class="row">
      <div class="col-12">
          <div class="mb-3">
          <h6 class="text-gray-800"> 1. Berikan data/informasi mengenai layanan digital yang menggunakan Pendekatan RB Tematik di instansi pusat atau Pemerintah Daerah</h6>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Jawaban" name="deskripsi" required autofocus value = "{{ old('deskripsi') }}">
                    </div>
                    <div class="mb-3">
                    <input  type="file" id="foto" 
                    name="foto" required autofocus value = "{{ old('foto') }}">
                </div>
                </div>
                <hr>
            
                <h6 class="text-gray-800"> 2. Berikan data/informasi mengenai layanan digital yang menggunakan Pendekatan RB Tematik di instansi pusat atau Pemerintah Daerah</h6>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Jawaban" name="deskripsi" required autofocus value = "{{ old('deskripsi') }}">
                    </div>
                    <div class="mb-3">
                    <input  type="file" id="foto" 
                    name="foto" required autofocus value = "{{ old('foto') }}">
                </div>
                </div>
                <hr>

                <h6 class="text-gray-800"> 3. Berikan data/informasi mengenai layanan digital yang menggunakan Pendekatan RB Tematik di instansi pusat atau Pemerintah Daerah</h6>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Jawaban" name="deskripsi" required autofocus value = "{{ old('deskripsi') }}">
                    </div>
                    <div class="mb-3">
                    <input  type="file" id="foto" 
                    name="foto" required autofocus value = "{{ old('foto') }}">
                </div>
                </div>
                <hr>

                <h6 class="text-gray-800"> 4. Berikan data/informasi mengenai rencana atau pemanfaatan arsitektur SPBE dalam penyiapan layanan digital terpadu</h6>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Jawaban" name="deskripsi" required autofocus value = "{{ old('deskripsi') }}">
                    </div>
                    <div class="mb-3">
                    <input  type="file" id="foto" 
                    name="foto" required autofocus value = "{{ old('foto') }}">
                </div>
                </div>
                <hr>

          <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </div>
  </form>
  </div>
  </div>
    
    <div class="mb-4">
    <button  onclick="myFunction2()" class="btn btn-primary btn-sm"> Lihat Skor Indeks </button>
    </div>

    <div id="myDIV2">
        <p class=" mb-2 text-gray-800 text-center">Nilai Index <br> Total </p>
        <h3 class=" mb-0 text-gray-800 text-center font-weight-bold "> 0.195 </h3>
        <p class=" mb-4 text-gray-800 text-center">Domain</p>
        
        <div class="row justify-content-md-center">
        @foreach ($domain as $domain)
        <div class="col-md-auto">{{ $domain->deskripsi}}</div>
        @endforeach
        </div>
        <hr width="60%">

        <div class="row justify-content-md-center ml-5">
        <div class="col-md-2 ml-5">1.50</div>
        <div class="col-md-2">1.50</div>
        <div class="col-md-2">1.50</div>
        <div class="col-md-2 mr-3">1.50</div>
        </div>
        <hr width="60%">

        <p class=" text-gray-800 text-center mt-5">Aspek</p>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Kebijakan Tata Kelola SPBE</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Perencanaan Strategis SPBE</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Teknologi Informasi dan Komunikasi</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Penyelenggara SPBE</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Penerapan Manajemen SPBE</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Pelaksanaan Audit TIK</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Layanan Administrasi Pemerintahan Berbasis Elektronik</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
        <div class="row justify-content-md-center">
        <div class="col-6 col-sm-7">Layanan Publik Berbasis Elektronik</div>
        <div class="col-6 col-sm-1">0.0</div>
        </div>
        <hr width="70%">
    </div>

    <p class=" mt-5 mb-2 text-gray-800">Data Indikator</p>
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <thead>
                        <th>No</th>
                        <th>Nama Indikator</th>
                        <th>Aksi</th>
                </thead>
            </tr>
                <tbody>
                @if ($indikator2->count() > 0)
                @foreach ($indikator2 as $indikator2)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $indikator2->deskripsi}}</td>
                        <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('penilaian.edit', $indikator2->id) }}"> {{ $indikator2->nama_indikator}}</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection