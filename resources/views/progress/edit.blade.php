@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="{{ route('progress.update', $progress->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Progress</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="nama_progress" class="form-label">Nama Progress</label>
                    <input type="text" class="form-control @error('nama_progress') is-invalid @enderror" id="nama_progress" 
                    name="nama_progress" value = "{{ $progress->nama_progress }}">
                
                </div>

                <div class="mb-3">
                    <label for="mulai" class="form-label">Waktu Dimulai</label>
                    <input type="datetime-local" class="form-control @error('mulai') is-invalid @enderror" id="mulai" 
                    name="mulai" value = "{{ $progress->mulai }}">
                
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Waktu Ditutup</label>
                    <input type="datetime-local" class="form-control @error('selesai') is-invalid @enderror" id="selesai" 
                    name="selesai" value = "{{ $progress->selesai }}">
                
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
