@extends('adminlte::page')
@section('content')
<div class="container">


      
    <div class = "row">
        <div class = "col-md-10">
        <div class="card">
          <div class="card-header">
            Input Data
          </div>
          {!! Form::model($user, ['route'=> ['password.update', $user->id], 'method'=>'PATCH']) !!}
            <label>Name</label>
            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
            </div>
            <label>Email</label>
            <div class="form-group">
                {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email ', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
            <label>Password</label>
                <input type="text" name="password" class="form-control" required id="tunggal"   placeholder="Password">
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