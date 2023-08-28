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

                <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                    name="deskripsi" value = "{{ $domain->deskripsi }}">
                </div> 
          
                <div class="mb-3">
                    <label for="bobot_nilai" class="form-label">Bobot Nilai</label>
                    <input type="text" class="form-control @error('bobot_nilai') is-invalid @enderror" id="bobot_nilai" 
                    name="bobot_nilai" value = "{{ $domain->bobot_nilai }}">
                </div>
            
          <div class="card-footer">
          <div class="form-group pull-right"><a href="{{url()->previous()}}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
