@extends('layout-admin.main')


@section('navbar')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel OPD</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        {{-- TOMBOL TAMBAH --}}
            <a href="opd/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-40">
                     <i class="fas fa-plus"></i>
                </span>
                 <span class="text">Tambah OPD</span>
            </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama OPD</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @if ($opd->count() > 0)
                @foreach ($opd as $opd)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $opd->nama_opd}}</td>
                        <td>
                        <form action="{{ route('opd.destroy', $opd->id) }}" method="POST"  data-bs-toggle="tooltip" >
                        @method('DELETE')
                        @csrf
                        <button  class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                        <i class="fas fa-trash"></i> 
                      </button>
                      
                        <a href="{{ route('opd.edit', $opd->id) }}" class="btn btn-warning btn-circle btn-sm" data-bs-toggle="tooltip" >
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#FFFFFF" />
                          </svg>
                        </a>
                        </form>
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