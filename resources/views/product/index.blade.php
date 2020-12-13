@extends('layouts.app')
@section('js')
    <script>
        $("#deleteBtn").on('click', function(e) {
            console.log("ok");
            if (!confirm("Do you really want to do this?")) {
                return false;
            }
            e.preventDefault();
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url:  'product/'+id,
                type: 'DELETE',
                data: {
                    _token: token,
                },
                success: function() {
					//window.open('http://localhost:8000/product', '_blank');
					//console.log("done");
					let element = document.getElementById("element-"+id);
					element.remove();
                }
            });
        });

    </script>
@endsection
@section('content')
    {{-- <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }}
                <a href="/profiles/{{ $user->id }}">{{ $user->name }}</a>
                <a href="/profiles/{{ $user->id }}/edit" class="btn btn-primary" role="button">edit</a>
            </li>
        @endforeach
    </ul> --}}
    @include('product.navproduct')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Product Table</h4>
                    </div>
                    <div style="padding: 0 20px">
                        <a class="btn btn-primary btn-block" style="font-size: 24px" href="/product/create">Create
                            Product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    {{-- <th></th> --}}
                                    <th>
                                        id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                  

                                    <th>Gender</th>
									<th>Amount</th>
									<th>
                                        Unit Price
                                    </th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr id="element-{{$product->id}}">
                                            {{-- <td>
                                                {{ $product->pictureURL }}
                                            </td> --}}
                                            <td>
                                                {{ $product->id }}
                                            </td>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            
                                            <td>
                                                {{ $product->gender }}
                                            </td>
                                            <td>
                                                {{ $product->amount }}
											</td>
											<td>
                                                {{ $product->price }}
                                            </td>
                                            <td>
                                                <a href="/product/{{$product->id}}" class="btn btn-info btn-fill">View</a>
                                            </td>
                                            <td>
												
												<button  data-id="{{$product->id}}" id="deleteBtn" class="btn btn-danger btn-fill">Detele</button>
											
                                            </td>
                                            {{-- <td>
                                                <input type="password" name="" id="input-{{ $user->id }}"
                                                    value="{{ $user->password }}">
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-fill" href="/profile/{{ $user->id }}">View
                                                    Profile</a>
                                            </td>
                                            <td>
                                                <form action="/user/{{ $user->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-fill" type="submit">Delete
                                                        User</button>
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-fill" id="{{ $user->id }}"
                                                    onclick="viewClick(this)">view</button>
                                            </td> --}}
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
@endsection
