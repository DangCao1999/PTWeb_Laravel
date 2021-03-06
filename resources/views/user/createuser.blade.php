@extends('layouts.app')
@section('content')
@include('user.navuser')
<div class="content">
    
    <div class="row">
<div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Create User</h5>
      </div>
      <div class="card-body">
      <form action ="{{route('user.store')}}" method="POST">
        @csrf 
        @method('POST')
            <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Role</label>
                      <select class="form-control" name="role">
                          <option value="1">Admin</option>
                          <option value="2">Editor</option>
                          <option value="3">Customer</option>
                        </select>
  
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
              
              <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary btn-fill" style="font-size: 15px" >Create User</button>
              </div>
              
        </form>
      </div>
      
    </div>
  </div>
    </div>
</div>
  @endsection