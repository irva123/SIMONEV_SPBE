@extends('layout-admin.main')

@section('navbar')
<div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
            <div class="col-lg-8">        
            <form method="post" action="/periode" enctype= multipart/form-data>
                @csrf
                <div class="form-group">
                <label for="tahun">Tahun</label>
                <select class="custom-select" id="tahun" name="tahun">
                <option value=2022>2022</option>
                <option value=2023>2023</option>
                <option value=2024>2024</option>
                <option value=2025>2025</option>
                <option value=2026>2026</option>
                <option value=2027>2027</option>
            </select>
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
              
                <label for="status" >Status</label>
                <input  class="toggle-class @error('status') is-invalid @enderror" type="checkbox" name="status" required autofocus value = "{{ old('status') }}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
                @error('status')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </br>
                </br>             

            <!-- <div class="form-group">
            <div class='input-group date' id='datetimepicker'>
            <input type='text' class="form-control" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
            </div> -->
                
         </form>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        @endsection