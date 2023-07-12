@extends('layout-admin.main')

@section('navbar')
<div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
            <div class="col-lg-8">        
            <form method="post" action="{{ route('periode.update', $periode->id) }}" enctype= multipart/form-data>
            @method ('PUT')  
                @csrf
                <div class="form-group">
                <label for="tahun">Tahun</label>
                <select class="form-select" id="tahun" name="tahun">
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
                    <input type="text" class="form-control @error('mulai') is-invalid @enderror" id="mulai" 
                    name="mulai"  value = "{{ $periode->mulai }}">
                @error('mulai')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Waktu Ditutup</label>
                    <input type="text" class="form-control @error('selesai') is-invalid @enderror" id="selesai" 
                    name="selesai"  value = "{{ $periode->selesai }}">
                @error('selesai')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" 
                    name="status" required autofocus value = "{{ $periode->status }}">
                @error('status')
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