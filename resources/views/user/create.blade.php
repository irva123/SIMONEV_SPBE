@extends('layout-admin.main')

@section('navbar')
  <form method="post" action="/user" enctype= multipart/form-data>
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
                    name="username" required autofocus value = "{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" 
                    name="nama_lengkap" required autofocus value = "{{ old('nama_lengkap') }}">
                @error('nama_lengkap')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" 
                    name="nip" required autofocus value = "{{ old('nip') }}">
                @error('nip')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" 
                    name="email" required autofocus value = "{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
                    name="no_hp" required autofocus value = "{{ old('no_hp') }}">
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" 
                    name="password" required autofocus value = "{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
                </div>
                
                <div class="form-group">
                <label for="role">Role User</label>
                <select class="custom-select" id="role" name="role">
                <option value=admin>Admin</option>
                <option value=opd>OPD</option>
                <option value=evaluator>Evaluator Eksternal</option>
                </select>
                </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection