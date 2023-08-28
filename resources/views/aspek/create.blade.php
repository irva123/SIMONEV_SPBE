@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="/aspek" enctype= multipart/form-data>
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Aspek</h6>
          </div>
          <div class="card-body">
          <div class="form-group">
                <label for="id_domain">Nama Domain</label>
                <select class="custom-select" name="id_domain">
                @foreach($domain as $domain)
                @if(old('id_domain') == $domain->id)
                    <option value="{{$domain->id}}" selected>{{ $domain->nama_domain }} {{ $domain->deskripsi }}</option>
                @else 
                    <option value="{{$domain->id}}">{{ $domain->nama_domain }} {{ $domain->deskripsi }}</option>
                @endif
                @endforeach
                </select>
                </div>

          <div class="mb-3">
          <label for="nama_aspek" class="form-label">Nama Aspek</label>
                    <input type="text" class="form-control @error('nama_aspek') is-invalid @enderror" id="nama_aspek" 
                    name="nama_aspek" required autofocus value = "{{ old('nama_aspek') }}">
                @error('nama_aspek')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                    name="deskripsi" required autofocus value = "{{ old('deskripsi') }}">
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>
            
                <div class="mb-3">
                    <label for="bobot_nilai" class="form-label">Bobot Nilai</label>
                    <input type="text" class="form-control @error('bobot_nilai') is-invalid @enderror" id="bobot_nilai" 
                    name="bobot_nilai" required autofocus value = "{{ old('bobot_nilai') }}">
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
