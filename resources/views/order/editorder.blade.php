@extends('layouts.app')
@section('js')
    <script>
        $("#avatar").on('change', function() {
            var filename = $(this).val();
            $(this).next('.custom-file-label').html(filename);
        });

        // $("#deleteBtn").on('click', function(e) {
        //     console.log("ok");
        //     if (!confirm("Do you really want to do this?")) {
        //         return false;
        //     }
        //     e.preventDefault();
        //     var id = $(this).data("id");
        //     var token = $("meta[name='csrf-token']").attr("content");
        //     $.ajax({
        //         url: 'product/' + id,
        //         type: 'DELETE',
        //         data: {
        //             _token: token,
        //         },
        //         success: function() {
        //             //window.open('http://localhost:8000/product', '_blank');
        //             console.log("done");
        //             // let element = document.getElementById("element-" + id);
        //             // element.remove();
        //         }
        //     });
        // });

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
                                        <input  name="id" disabled class="form-control"  value="{{$users->id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input disabled type="text" name="name" class="form-control" placeholder="Name of User"
                                            value="{{$users->name}}">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: flex-end;">
                                <a href="{{route('profile.show', $users->id)}}" class="btn btn-primary btn-fill" style="font-size: 15px">Show
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
                                @foreach ($products as $product)
                                <tr id="element-{{$product->id}}">
                                    <td>
                                        {{ $product->id }}

                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td>
                                        {{ $product->quantity * $product->price }} VNĐ
                                    </td>
                                    <td>
                                        <form action="{{route("order.deleteProduct", ["oid" => $order_details[0]->oid, "pid" => $product->id])}}" onsubmit="if(!confirm('Is the form filled out correctly?')){return false;}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button data-id="{{$product->id}}" id="deleteBtn" class="btn btn-danger btn-fill">Detele</button>
                                    </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-fill" href="/product/{{$product->id}}">View Product</a>
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
@endsection
