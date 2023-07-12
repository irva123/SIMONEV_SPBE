@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="/progress" enctype= multipart/form-data>
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Progress</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="nama_progress" class="form-label">Nama Progress</label>
                    <input type="text" class="form-control @error('nama_progress') is-invalid @enderror" id="nama_progress" 
                    name="nama_progress" required autofocus value = "{{ old('nama_progress') }}">
                @error('nama_progress')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="mulai" class="form-label">Waktu Dibuka</label>
                    <input type="datetime-local" class="form-control @error('mulai') is-invalid @enderror" id="mulai" 
                    name="mulai" required autofocus value = "{{ old('mulai') }}">
                @error('mulai')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Waktu Ditutup</label>
                    <input type="datetime-local" class="form-control @error('selesai') is-invalid @enderror" id="selesai" 
                    name="selesai" required autofocus value = "{{ old('selesai') }}">
                @error('selesai')
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
