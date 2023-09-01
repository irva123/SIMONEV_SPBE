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
            <form action="/filter" method="get">
                            @csrf
            <div class="form-group">
                <select name="tahun" id="tahun" class="custom-select" >
                <option value="2022" selected="{{isset($_GET['tahun']) && $_GET['tahun'] == '2022'}}">2022</option>
                <option value="2023" selected="{{isset($_GET['tahun']) && $_GET['tahun'] == '2023'}}">2023</option>
                </select>
                </div>
                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
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
                     @foreach ($periodeaktif as $list)
                        <td>1</td>
                        <td>{{ $list->tahun}}</td>
                        <td>{{ $list->selesai}}</td>
                        <td>blas </td>
                        <td>
                        <a href="/penilaian/create" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Kerjakan
                        </a>
                        <a href="/" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Lihat
                        </a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection