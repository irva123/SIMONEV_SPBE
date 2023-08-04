@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="{{ route('opd.update', $opd->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit OPD</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="nama_opd" class="form-label">Nama OPD</label>
                    <input type="text" class="form-control @error('nama_opd') is-invalid @enderror" id="nama_opd" 
                    name="nama_opd" value = "{{ $opd->nama_opd }}">
                
                </div>    
            
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection