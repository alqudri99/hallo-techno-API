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

    <div class="gallery">
        <img src="{{$datas->icon}}" alt="Cinque Terre" width="600" height="400">
    </div>

      
    <div class = "row">
        <div class = "col-md-10">
        <div class="card">
          <div class="card-header">
            Edit Kategori
          </div>
          <div class="card-body">
            {!! Form::model($datas, ['route'=> ['category.update', $datas->id], 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
            <label>Nama Kategori</label>
            <div class="form-group">
                {!! Form::text('category_name', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                <label for="site_name">Icon</label>
                <input type="file" name="image" class="form-control">
              </div>
            <div class="form-group">
                {!! Form::submit('Edit', ['class'=>'btn-sm btn-success']) !!}
            </div>
            {!! Form::close() !!}
           
            
          </div>
        </div>
        </div>
        </div>
</div>

@endsection