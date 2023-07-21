@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="/indikator" enctype= multipart/form-data>
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Indikator</h6>
          </div>
          <div class="card-body">
          <div class="form-group">
                <label for="id_domain">Nama Domain</label>
                <select class="custom-select" name="id_domain">
                @foreach($domain as $domain)
                @if(old('id_domain') == $domain->id)
                    <option value="{{$domain->id}}" selected>{{ $domain->nama_domain }}</option>
                @else 
                    <option value="{{$domain->id}}">{{ $domain->nama_domain }}</option>
                @endif
                @endforeach
                </select>

                <label for="id_aspek">Nama Aspek</label>
                <select class="custom-select" name="id_aspek">
                @foreach($aspek as $aspek)
                @if(old('id_aspek') == $aspek->id)
                    <option value="{{$aspek->id}}" selected>{{ $aspek->nama_aspek }}</option>
                @else 
                    <option value="{{$aspek->id}}">{{ $aspek->nama_aspek }}</option>
                @endif
                @endforeach
                </select>
                </div>

                <div class="mb-3">
                <label for="nama_indikator" class="form-label">Nama Indikator</label>
                    <input type="text" class="form-control @error('nama_indikator') is-invalid @enderror" id="nama_indikator" 
                    name="nama_indikator" required autofocus value = "{{ old('nama_indikator') }}">
                @error('nama_indikator')
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
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection