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
                        <th>Nama OPD</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                @foreach ($users as $users)
                <tr>
                        <td>{{ ++$i }}</td>
                        <td>@if($users->id_role == "2")
                        {{ $users->nama_role}} ({{ $users->nama_opd }})
                        @else
                        {{ $users->nama_role}} 
                        @endif</td>
                        <td>
                        <a href="/" class="btn btn-primary  btn-sm" data-bs-toggle="tooltip" > Lihat
                        </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection