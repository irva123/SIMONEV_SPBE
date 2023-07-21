@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="{{ route('domain.update', $domain->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Domain</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="nama_domain" class="form-label">Nama Domain</label>
                    <input type="text" class="form-control @error('nama_domain') is-invalid @enderror" id="nama_domain" 
                    name="nama_domain" value = "{{ $domain->nama_domain }}">
                
                </div>    
            
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
