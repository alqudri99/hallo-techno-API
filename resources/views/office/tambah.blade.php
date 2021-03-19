@extends('adminlte::page')
@section('content')
<div class="container">
    <div class = "row">
        <div class = "col-md-10">
        {{-- <a href="{{route('jabatan.create')}}" class="btn-sm btn-danger">Tambah Pegawai</a> --}}
        <div class="card">
    
          <div class="card-header">
            <b>Input Data BTS</b>
          </div>

          <div class="card-body">
          <form action="{{route('office.store')}}"  method="POST">
          @csrf
          <div class="form-group">
            <label for="site_name">Provinsi</label>
            <input type="text" name="province" class="form-control" id="tunggal" required   placeholder="Provinsi">
          </div>

          <div class="form-group">
            <label for="site_name">Alamat Lengkap</label>
            <input type="text" name="address" class="form-control" id="tunggal" required   placeholder="Alamat Lengkap">
          </div>

          <div class="form-group">
            <label for="site_name">Nama</label>
            <input type="text" name="name" class="form-control" id="tunggal" required    placeholder="Nama">
          </div>

          <div class="form-group">
            <label for="site_name">Kontak</label>
            <input type="number" name="no_hp" class="form-control" id="tunggal" required   placeholder="Kontak">
          </div>

    

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
          </div>
        </div>
        </div>
        </div>
</div>


@endsection