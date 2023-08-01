@extends('layout-admin.main')

@section('navbar')
<form method="post" action="{{ route('user.update', $users->id) }}" enctype= multipart/form-data>
  @method ('PUT')
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
          </div>
          <div class="card-body">
          <div class="mb-3">
          <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
                    name="username" value = "{{ $users->username }}">
                </div>

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" 
                    name="nama_lengkap" value = "{{ $users->nama_lengkap }}">
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" 
                    name="nip" value = "{{ $users->nip }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" 
                    name="email" value = "{{ $users->email }}">
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
                    name="no_hp" value = "{{ $users->no_hp }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group">
                <label for="role">Role User</label>
                <select class="custom-select" id="role" name="role">
                <option value='admin' @selected($users->role == 'admin')>Admin</option>
                <option value='opd' @selected($users->role == 'opd')>OPD</option>
                <option value='evaluator' @selected($users->role == 'evaluator')>Evaluator Eksternal</option>
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