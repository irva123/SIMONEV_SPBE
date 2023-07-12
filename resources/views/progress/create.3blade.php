@extends('layout-admin.main')

@section('navbar')
<div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
            <div class="col-lg-8">        
            <form method="post" action="/progress" enctype= multipart/form-data>
                @csrf

                <div class="mb-3">
                    <label for="nama_progress" class="form-label">Nama Progress</label>
                    <input type="text" class="form-control @error('nama_progress') is-invalid @enderror" id="nama_progress" 
                    name="nama_progress" required autofocus value = "{{ old('nama_progress') }}">
                @error('nama_progress')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror

                <div class=" col-6">
                <label for="id_periode">Tahun Periode</label>
                <select class="form-select" name="id_periode">
                @foreach($periode as $periode)
                @if(old('id_periode') == $periode->id)
                    <option value="{{$periode->id}}" selected>{{ $periode->tahun }}</option>
                @else 
                    <option value="{{$periode->id}}">{{ $periode->tahun }}</option>
                @endif
                @endforeach
                </select></br>
                </div>

                <div class="mb-3">
                    <label for="mulai" class="form-label">Waktu Dibuka</label>
                    <input type="text" class="form-control @error('mulai') is-invalid @enderror" id="mulai" 
                    name="mulai" required autofocus value = "{{ old('mulai') }}">
                @error('mulai')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Waktu Ditutup</label>
                    <input type="text" class="form-control @error('selesai') is-invalid @enderror" id="selesai" 
                    name="selesai" required autofocus value = "{{ old('selesai') }}">
                @error('selesai')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>
 
                <div class=" col-6">
                <label for="id_users">User</label>
                <select class="form-select" name="id_users">
                @foreach($users as $users)
                @if(old('id_users') == $users->id)
                    <option value="{{$users->id}}" selected>{{ $users->username }}</option>
                @else 
                    <option value="{{$users->id}}">{{ $users->username }}</option>
                @endif
                @endforeach
                </select></br>
                </div>
                
                

            <!-- <div class="form-group">
            <div class='input-group date' id='datetimepicker'>
            <input type='text' class="form-control" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
            </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
         </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        @endsection