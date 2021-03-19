@extends('adminlte::page')
@section('content')
<style>
  .body{
    height: 100%; width: 100%; margin: 0;
  }
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: left;
      width: 180px;
    }
    
    div.gallery:hover {
      border: 1px solid #777;
    }
    
    div.gallery img {
      width: 100%;
      height: auto;
    }
    
    div.desc {
      padding: 15px;
      text-align: center;
    }

    .containerr {
  position: relative;
  width: 10%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.containerr:hover .image {
  opacity: 0.3;
}

.containerr:hover .middle {
  opacity: 1;
}

.text {
  background-color: #ff6767;
  color: white;
  font-size: 16px;
  padding: 5px 20px;
}
    </style>
<div class="container">
    @foreach ($image as $item)
    <div class="gallery">
        <img src="{{$item->url}}" alt="Cinque Terre" width="600" height="400">
      
      <a onclick="myFunction({{$item->id}})" href="#">
        <div  class="text">Hapus</div>
      </a>
    </div>
    @endforeach
      
    <div class = "row">
        <div class = "col-md-10">
        <div class="card">
          <div class="card-header">
            Input Data
          </div>
          <div class="card-body">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <div class="form-group">
                <label>Kategori</label>
                <select id="id_jabatan" name="category_id" class="form-control select2" style="width: 100%;">
                  @foreach ($kategori as $item)
                  <?php if($datas->category_id == $item->id) : ?>
                <option value="{{$item->id}}" selected="selected">{{$item->category_name}}</option>
                      <?php else : ?>
                <option  value="{{$item->id}}">{{$item->category_name}}</option>
                      <?php endif; ?>
                  @endforeach
                </select>
              </div>
    
    
              <div class="form-group">
                <label for="site_name">Nama Produk</label>
                <input type="text" value="{{$datas->product_name}}" name="product_name" class="form-control" id="tunggal" required  placeholder="Nama Produk">
              </div>
    
              <div class="form-group">
                <label for="site_name">Harga</label>
                <input type="number" value="{{$datas->price}}" name="price" class="form-control" id="depan_depan" required  placeholder="Harga">
              </div>
    
              <div class="form-group">
                <label for="site_name">Stok Produk</label>
                <input type="number" value="{{$datas->stock}}" name="stock" class="form-control" id="depan_depan" required  placeholder="Stok">
              </div>
    
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea id="editor1" name="description" rows="10" cols="80">
                  {{$datas->description}}
                </textarea>
              </div>
              <div class="form-group">
                <label for="site_name">Link</label>
                <input type="text" value="{{$datas->link}}" name="link" class="form-control" id="depan_samping" required  placeholder="Ran Barang">
              </div>  
    
              <label for="site_name">Gambar</label>
              
              <div class="input-group control-group increment" >
                <input type="file" name="images[]" class="form-control" >
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
  
    CKEDITOR.replace('editor1')
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
<script>
    function myFunction(id){
        console.log('asa' +id)
        
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
window.location.reload(false); 
}
};
xhttp.open("GET", "https://websitetestertriha.my.id//hapus?id="+id, true);
xhttp.send();
    }


    function getGrafik(tahun, kecamatan){

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
var i = 0;
var myobj = JSON.parse(this.responseText);
console.log(myobj['data'][Object.keys(myobj['data'])[0]])
// console.log(myobj.data)
// console.log(myobj[Object.keys(myobj)[1]])
data = []
for(i;i<myobj['legend'].length;i++){
  console.log('data ' +myobj[Object.keys(myobj['data'])[i]])
  console.log(myobj[Object.keys(myobj.data)[i]])
  // console.log
  // var label = ['MD Laki', 'LR Laki', 'LB Laki', 'MD Wanita', 'LR Wanita', 'LB Wanita']
  // var border = ['#3252a8', '#7732a8', '#a83261', '#3294a8', '#e89415', '#e81515']
  var single = {}
  single['data'] = myobj['data'][Object.keys(myobj['data'])[i]]
  single['label'] = myobj['legend'][i]
  single['borderColor'] = myobj['labelColor'][i]
  data.push(single)
}
grafik(data, myobj['title'])

}
};
xhttp.open("GET", "getdata?mode="+kecamatan+"&tahun="+tahun, true);
xhttp.send();
}
</script>
@endsection