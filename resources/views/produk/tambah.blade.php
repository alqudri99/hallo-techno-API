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
          <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label>Kategori</label>
            <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;">
              @foreach ($kategori as $item)
            <option  value="{{$item->id}}">{{$item->category_name}}</option>
              @endforeach
            </select>
          </div>


          <div class="form-group">
            <label for="site_name">Nama Produk</label>
            <input type="text" name="product_name" class="form-control" id="tunggal" required  placeholder="Nama Produk">
          </div>

          <div class="form-group">
            <label for="site_name">Harga</label>
            <input type="number" name="price" class="form-control" id="depan_depan" required  placeholder="Harga">
          </div>

          <div class="form-group">
            <label for="site_name">Stok Produk</label>
            <input type="number" name="stock" class="form-control" id="depan_depan" required  placeholder="Stok">
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea id="editor1" name="description" rows="10" cols="80">
            </textarea>
          </div>
          <div class="form-group">
            <label for="site_name">Link</label>
            <input type="text" name="link" class="form-control" id="depan_samping" required  placeholder="Ran Barang">
          </div>  

          <label for="site_name">Gambar</label>
          
          <div class="input-group control-group increment" >
            <input type="file" name="images[]" required class="form-control" >
            <div class="input-group-btn"> 
              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
          </div>
          <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="file" name="images[]" class="form-control">
              <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
          </div>
        </div>
        </div>
        </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.

  CKEDITOR.replace('editor1').editorConfig = function( config ) {

  config.removeButtons = 'Strike,Subscript,Superscript,RemoveFormat';
};
})
</script>


<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@endsection