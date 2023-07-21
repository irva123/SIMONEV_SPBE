@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="{{ route('aspek.update', $aspek->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Aspek</h6>
          </div>
          <div class="card-body">
          <div class="form-group">
                <label for="id_domain">Nama Domain</label>
                <select class="custom-select" name="id_domain">
                @foreach($domain as $domain)
                    <option @selected($domain->id == $aspek->id_domain) value="{{$domain->id}}"  @class([
                'bg-purple-600 text-white' => $domain->id == $aspek->id_domain ])> {{ $domain->nama_domain }}</option>
                
                @endforeach
                </select>
                </div>
          <div class="mb-3">
          <label for="nama_aspek" class="form-label">Nama Aspek</label>
                    <input type="text" class="form-control @error('nama_aspek') is-invalid @enderror" id="nama_aspek" 
                    name="nama_aspek" value = "{{ $aspek->nama_aspek }}">
                
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
