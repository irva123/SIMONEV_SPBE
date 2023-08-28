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
            <div class="form-group">
                <select name="tahun" id="tahun" class="custom-select" >
                @foreach ($periode as $periode)
                <option value="{{ $periode->id }}">{{ $periode->tahun }}</option>
                @endforeach
                </select>
                </div>
                <thead>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Batas Waktu</th>
                        <th>Kemajuan</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                     @if ($progress->count() > 0)
                     @foreach ($progress as $progress)
                        <td>{{ ++$i }}</td>
                        <td>{{ $progress->tahun}}</td>
                        <td>{{ $progress->selesai}}</td>
                        <td>bla</td>
                        <td>
                        <a href="/penilaian/create" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Kerjakan
                        </a>
                        <a href="/" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Lihat
                        </a>
                        </form>
                        </td>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection