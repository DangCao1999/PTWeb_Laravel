@extends('layouts.app')
@section('js')
    <script>
        $("#avatar").on('change', function() {
            var filename = $(this).val();
            $(this).next('.custom-file-label').html(filename);
        })

    </script>
@endsection('js')
@section('content')
    @include('order.navorder')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">User Detail</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input  name="id" disabled class="form-control"  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name of User"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: flex-end;">
                                <a href="user/" class="btn btn-primary btn-fill" style="font-size: 15px">Show
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Product List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-primary">
                                {{-- <th></th> --}}
                                <th>
                                    id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                {{-- @foreach ($orders as $order)
                                <tr id="element-{{$order->id}}">

                                    <td>
                                        {{ $order->id }}

                                    </td>
                                    <td>
                                        {{ $order->pre_money }}
                                    </td>

                                    <td>
                                        {{ $order->status }}
                                    </td>
                                    <td>
                                        {{ $order->created_at }}
                                    </td>
                                    <td>
                                        {{ $order->updated_at }}
                                    </td>
                                    <td>
                                        <a href="/order/{{$order->id}}" class="btn btn-info btn-fill">View</a>
                                    </td>
                                    <td>

                                        <button  data-id="{{$order->id}}" id="deleteBtn" class="btn btn-danger btn-fill">Detele</button>

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
                               {{-- </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
