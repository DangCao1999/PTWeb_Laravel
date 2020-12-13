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
                        <h5 class="title">Create Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("product.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name of product"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Unit Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="1000" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input name="gender" type="text" list="genders" class="form-control">
                                        <datalist id="genders">
                                            <option> Male
                                            <option> Female
                                            <option> Both
                                        </datalist>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input name="amount" type="number" placeholder="0" class="form-control">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" cols="80" placeholder="add description of product" name="description" class="form-control"></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <div class="form-control">
                                        <input id="avatar" type="file" accept="image/*" name="avatar"
                                        class="form-control">
                                    <label class="custom-file-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary btn-fill" style="font-size: 15px">Create
                                    Product</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
