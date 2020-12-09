@extends('layouts.app')

	@section('content')
		{{-- <ul>
			@foreach($users as $user)
                <li>
                    {{$user->name}}
                    <a href="/profiles/{{$user->id}}">{{$user->name}}</a>
                    <a href="/profiles/{{$user->id}}/edit" class="btn btn-primary" role="button">edit</a>
                </li>
			@endforeach
		</ul> --}}
		@include('user.navuser')
		<div class="content">

			<div class="row">

			  <div class="col-md-12">
				<div class="card">

				  <div class="card-header">
					<h4 class="card-title"> Simple Table</h4>
				  </div>
				  <div style="padding: 0 20px">
					<a class="btn btn-primary btn-block" style="font-size: 24px" href="/user/create" >Create User</a>
					  </div>
				  <div class="card-body">
					<div class="table-responsive">
					  <table class="table">
						<thead class=" text-primary">
						  <th>
							id
						  </th>
						  <th>
							Name
						  </th>
						  <th>
							Email
						  </th>
						  <th>
							Password
						  </th>
						  <th></th>
						  <th></th>
						  <th></th>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<tr>
									<td>
										{{$user->id}}
									  </td>
									<td>
										{{$user->name}}
									  </td>
									  <td>
										{{$user->email}}
									  </td>
									  <td>
									  <input type="password" name="" id="input-{{$user->id}}" value="{{$user->password}}">
									  </td>
									  <td>
										  <a href="/profile/create">Create Profile</a>
									  </td>
									  <td>
										  <button>View Profile</button>
                                      </td>
                                      <td>
                                        <button>Delete User</button>
                                    </td>
									  <td>
									  <button id="{{$user->id}}"onclick="viewClick(this)">view</button>
									  </td>
								</tr>
							@endforeach
						</tbody>
					  </table>
					</div>
				  </div>
				</div>
			  </div>

			</div>
		  </div>
		  <script>

			  function viewClick(button){
				let id = button.id;
				let ele = document.getElementById("input-"+id);
				if(ele.type == "password")
				{
					ele.type = "text";
				}
				else{
					ele.type = "password";
				}

			  }

		  </script>
	@endsection
