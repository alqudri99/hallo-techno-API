@extends('adminlte::page')
@section('content')
<div class="container">
    <div class = "row">
        <div class = "col">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Index Kategori</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class = "table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
              <tbody>
       @foreach($final as $data)
                <tr>
                  <td>{{$data->id}}</td>
                <td>{{$data->category_name}}</td>
                <td>
                <a href="{{route('category.edit', ['id'=>$data->id])}}" class="btn-sm btn-warning">Edit</a>
                <form action="{{route('category.destroy',['id'=>$data->id])}}" method="POST">
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

         
<script src="http://cdn.datatables.net/1.10.7/js/j5query.dataTables.min.js"></script>

          <script>
     
        jQuery(function($){
          $(document).ready(function(){
            $('#myTable').DataTable();
  })
          
});
        </script>
@endsection
