@extends('layout-admin.main')


@section('navbar')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tugas Penilaian Mandiri</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
            <form action="/penilaian" method="get">
                            @csrf
            <div class='row mb-3'>
            <div class="col-sm-3">
                <select name="tahun" id="tahun" class="custom-select" >
                @foreach ($periode as $periode)
                @if(old('tahun') == $periode->tahun)
                <option autofocus value="{{ $periode->tahun }}" selected>{{ $periode->tahun }}</option>
                @else 
                <option value="{{ $periode->tahun }}">{{ $periode->tahun }}</option>
                @endif
                @endforeach                  
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
                </div>
                </form>
                <thead>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Batas Waktu</th>
                        <th>Kemajuan</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                @if ($periodeaktif->count() > 0)
                @foreach ($periodeaktif as $list)
                <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $list->tahun}}</td>
                        <td>{{ $list->selesai}}</td>
                        <td><div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div></td>
                        <td>
                        <a href="/penilaian/create" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Kerjakan
                        </a>
                        <a href="/" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Lihat
                        </a>
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