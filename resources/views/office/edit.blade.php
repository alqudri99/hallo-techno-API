@extends('adminlte::page')
@section('content')
<div class="container">


      
    <div class = "row">
        <div class = "col-md-10">
        <div class="card">
          <div class="card-header">
            Input Data
          </div>
          <div class="card-body">
            {!! Form::model($datas, ['route'=> ['office.update', $datas->id], 'method'=>'PATCH']) !!}
            <label>Provinsi</label>
            <div class="form-group">
                {!! Form::text('province', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
            </div>

            <label>Alamat Lengkap</label>
            <div class="form-group">
                {!! Form::text('address', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
            </div>
            <label>Nama</label>
            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
            </div>
            <label>Kontak</label>
            <div class="form-group">
                {!! Form::number('no_hp', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
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