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
    @include('product.navproduct')
    <div class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("product.update", $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name of product"
                                            value="{{$product->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="number" name="id" disabled class="form-control"  value="{{$product->id}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="1000" value="{{$product->price}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Both">Both</option>
                                          </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input name="amount" type="number" placeholder="0" value="{{$product->amount}}" class="form-control">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" cols="80" placeholder="add description of product" name="description" class="form-control">{{$product->description}}</textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <div class="form-control">
                                        <input id="avatar" type="file" accept="image/*" name="avatar"
                                        class="form-control">
                                        <input hidden name="pictureURL" value="{{$product->pictureURL}}">
                                    <label class="custom-file-label">{{$product->pictureURL}}</label>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary btn-fill" style="font-size: 15px">Edit
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div style="padding: 5%" class="card">
                    <img id="pictureURL" src="http://localhost:8000{{ $product->pictureURL }}" alt="" srcset="">
                    <script>
                        let pic = document.getElementById("pictureURL");
                        let src = pic.src;
                        // console.log(src);
                        let srcsplit = src.split('.');
                        let srctail = srcsplit[srcsplit.length-1];
                        console.log(srctail);
                        if(srctail == "" || srctail == undefined || srctail=="/")
                        {
                            console.log("ok");
                            pic.src = "http://localhost:8000/assets/img/watch.svg";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
