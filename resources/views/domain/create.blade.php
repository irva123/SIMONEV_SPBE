@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="/domain" enctype= multipart/form-data>
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Domain</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="nama_domain" class="form-label">Nama Domain</label>
                    <input type="text" class="form-control @error('nama_domain') is-invalid @enderror" id="nama_domain" 
                    name="nama_domain" required autofocus value = "{{ old('nama_domain') }}">
                @error('nama_domain')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection