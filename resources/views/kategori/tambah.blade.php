@extends('adminlte::page')
@section('content')
<div class="container">
    <div class = "row">
        <div class = "col-md-10">
        {{-- <a href="{{route('jabatan.create')}}" class="btn-sm btn-danger">Tambah Pegawai</a> --}}
        <div class="card">
    
          <div class="card-header">
            <b>Tambah Kategori</b>
          </div>

          <div class="card-body">
          <form action="{{route('category.store')}}"  method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="site_name">Nama Kategory</label>
            <input type="text" name="category_name" class="form-control" required id="tunggal"   placeholder="Nama Kategori">
          </div>

          <div class="form-group">
            <label for="site_name">Icon</label>
            <input type="file" name="image" required class="form-control">
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
          </div>
        </div>
        </div>
        </div>
</div>


@endsection