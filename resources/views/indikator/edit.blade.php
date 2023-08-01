@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="{{ route('indikator.update', $indikator->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Indikator</h6>
          </div>
          <div class="card-body">
          <div class="form-group">
                <label for="id_domain">Nama Domain</label>
                <select class="custom-select" name="id_domain">
                @foreach($domain as $domain)
                    <option @selected($domain->id == $indikator->id_domain) value="{{$domain->id}}"  @class([
                'bg-purple-600 text-white' => $domain->id == $indikator->id_domain ])> {{ $domain->nama_domain }}</option>
                
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label for="id_aspek">Nama Aspek</label>
                <select class="custom-select" name="id_aspek">
                @foreach($aspek as $aspek)
                    <option @selected($aspek->id == $indikator->id_aspek) value="{{$aspek->id}}"  @class([
                'bg-purple-600 text-white' => $aspek->id == $indikator->id_aspek ])> {{ $aspek->nama_aspek }}</option>
                
                @endforeach
                </select>
                </div>

                <div class="mb-3">
                    <label for="nama_indikator" class="form-label">Nama Indikator</label>
                    <input type="text" class="form-control @error('nama_indikator') is-invalid @enderror" id="nama_indikator" 
                    name="nama_indikator" value = "{{ $indikator->nama_indikator }}">
                
                </div>

                <div class="mb-3">
                    <label for="bobot_nilai" class="form-label">Bobot Nilai</label>
                    <input type="text" class="form-control @error('bobot_nilai') is-invalid @enderror" id="bobot_nilai" 
                    name="bobot_nilai" value = "{{ $indikator->bobot_nilai }}">
                
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