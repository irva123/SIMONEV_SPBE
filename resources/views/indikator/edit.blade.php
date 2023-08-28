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
                <select class="custom-select" name="id_domain" id="id_domain">
                @foreach($domain as $domain)
                    <option @selected($domain->id == $indikator->id_domain) value="{{$domain->id}}"  @class([
                'bg-purple-600 text-black' => $domain->id == $indikator->id_domain ])> {{ $domain->nama_domain }}</option>
                
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label for="id_aspek">Nama Aspek</label>
                <select class="custom-select" name="id_aspek" id="id_aspek">
                @foreach($aspek as $aspek)
                    <option @selected($aspek->id == $indikator->id_aspek) value="{{$aspek->id}}"  @class([
                'bg-purple-600 text-black' => $aspek->id == $indikator->id_aspek ])> {{ $aspek->nama_aspek }}</option>
                
                @endforeach
                </select>
                </div>

                <div class="mb-3">
                    <label for="nama_indikator" class="form-label">Nama Indikator</label>
                    <input type="text" class="form-control @error('nama_indikator') is-invalid @enderror" id="nama_indikator" 
                    name="nama_indikator" value = "{{ $indikator->nama_indikator }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                    name="deskripsi" value = "{{ $indikator->deskripsi }}">
                </div>

                <div class="mb-3">
                    <label for="bobot_nilai" class="form-label">Bobot Nilai</label>
                    <input type="text" class="form-control @error('bobot_nilai') is-invalid @enderror" id="bobot_nilai" 
                    name="bobot_nilai" value = "{{ $indikator->bobot_nilai }}">
                </div>

                <div class="mb-3">
                    <label for="penjelasan_indikator" class="form-label">Penjelasan Indikator</label>
                    <textarea type="text" class="form-control @error('penjelasan_indikator') is-invalid @enderror" id="penjelasan_indikator" 
                    name="penjelasan_indikator">{{ $indikator->penjelasan_indikator}}
                    </textarea>
                  </div>

                <div class="mb-3">
                    <label for="kriteria1" class="form-label">Kriteria 1</label>
                    <textarea type="text" class="form-control @error('kriteria1') is-invalid @enderror" id="kriteria1" 
                    name="kriteria1">{{ $indikator->kriteria1}}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="kriteria2" class="form-label">Kriteria 2</label>
                    <textarea type="text" class="form-control @error('kriteria2') is-invalid @enderror" id="kriteria2" 
                    name="kriteria2">{{ $indikator->kriteria2}}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="kriteria3" class="form-label">Kriteria 3</label>
                    <textarea type="text" class="form-control @error('kriteria3') is-invalid @enderror" id="kriteria3" 
                    name="kriteria3">{{ $indikator->kriteria3}}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="kriteria4" class="form-label">Kriteria 4</label>
                    <textarea type="text" class="form-control @error('kriteria4') is-invalid @enderror" id="kriteria4" 
                    name="kriteria4">{{ $indikator->kriteria4}}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="kriteria5" class="form-label">Kriteria 5</label>
                    <textarea type="text" class="form-control @error('kriteria5') is-invalid @enderror" id="kriteria5" 
                    name="kriteria5">{{ $indikator->kriteria5}}
                    </textarea>
                </div>

                <div class="form-group" id="id_opd">
                <label class="form-label">OPD Terkait</label>
                <select class="custom-select" id="id_opd" name="id_opd">
                @foreach($opd as $opd)
                <option @selected($opd->id == $indikator->id_opd) value="{{$opd->id}}"  @class([
                'bg-purple-600 text-black' => $opd->id == $indikator->id_opd ])> {{ $opd->nama_opd }}</option>
                @endforeach
              </select>
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

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('penjelasan_indikator');
    </script>
@endpush