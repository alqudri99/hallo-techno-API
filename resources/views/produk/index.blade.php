@extends('adminlte::page')
@section('content')
<div class="container">
    <div class = "row">
        <div class = "col">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Index Product</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="label label-primary">Label</span>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class = "table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Stok Produk</th>
                    <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
              <tbody>
       @foreach($final as $data)
                <tr>
                <td>{{$data->category_name}}</td>
                <td>{{$data->product_name}}</td>
                <td>{{$data->stock}}</td>
                <td>{{$data->price}}</td>
                <td>
                <a href="{{route('product.edit', ['id'=>$data->id])}}" class="btn-sm btn-warning">Edit</a>
                <form action="{{route('product.destroy',['id'=>$data->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn-sm btn-danger">Hapus</button>
                
                  </form>
                </td>
                </tr>
                @endforeach 
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              The footer of the box
            </div>
            <!-- box-footer -->
          </div>
          <!-- /.box -->

         
{{-- <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> --}}

          <script>
     
        jQuery(function($){
          $(document).ready(function(){
            $('#myTable').DataTable();
  })
          
});
        </script>
@endsection
