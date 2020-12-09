@extends('layouts.app')
@section('content')
@include('user.navuser')
<div class="content">
    
    <div class="row">
<div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Create User</h5>
      </div>
      <div class="card-body">
      <form action ="{{route('user.store')}}" method="POST">
        @csrf 
        @method('POST')
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block" style="font-size: 24px" >Create User</button>
        </form>
      </div>
      
    </div>
  </div>
    </div>
</div>
  @endsection