@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="{{ route('periode.update', $periode->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Periode</h6>
          </div>

          <div class="card-body">
          <div class="form-group">
                <label for="tahun">Tahun</label>
                <select class="custom-select" id="tahun" name="tahun">
                <option value=2022 @selected($periode->tahun == 2022)>2022</option>
                <option value=2023 @selected($periode->tahun == 2023)>2023</option>
                <option value=2024 @selected($periode->tahun == 2024)>2024</option>
                <option value=2025 @selected($periode->tahun == 2025)>2025</option>
                <option value=2026 @selected($periode->tahun == 2026)>2026</option>
                <option value=2027 @selected($periode->tahun == 2027)>2027</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="mulai" class="form-label">Waktu Dibuka</label>
                    <input type="datetime-local" class="form-control @error('mulai') is-invalid @enderror" id="mulai" 
                    name="mulai" value = "{{ $periode->mulai }}">
                
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Waktu Ditutup</label>
                    <input type="datetime-local" class="form-control @error('selesai') is-invalid @enderror" id="selesai" 
                    name="selesai" value = "{{ $periode->selesai }}">
                
                </div>

                <div class="form-group">
                <label for="status">Status</label>
                <select class="custom-select" id="status" name="status">
                <option value='1' @selected($periode->status == '1')>Aktif</option>
                <option value='0' @selected($periode->status == '0')>Tidak Aktif</option>
                </select>
                </div>
               
            <!-- <div class="form-group">
            <label for="status" >Status</label>
                <input  class="toggle-class @error('status') is-invalid @enderror" type="checkbox" name="status" required autofocus value = "{{ old('status') }}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
                </div> -->
            
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
