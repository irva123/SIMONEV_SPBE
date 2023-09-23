@extends('layout-admin.main')


@section('navbar')
<div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-1">
    <h5 class="h5 mb-2 mt-3 text-gray-800">Tugas Penilaian Mandiri</h5>
</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Batas Waktu</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                @if ($periode->count() > 0)
                @foreach ($periode as $list)
                <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $list->tahun}}</td>
                        <td>{{ $list->selesai}}</td>
                        <td>
                        <a href="{{ route('penilaian_eks2.index2', $list->id) }}" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Lihat
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