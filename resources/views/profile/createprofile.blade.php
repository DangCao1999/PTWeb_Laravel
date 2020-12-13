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
    @include('user.navuser')
    <div class="content">
        <div class="row">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <h5 class="title">Create Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>User ID (disabled)</label>
                                        <input type="text" class="form-control" name="userId" disabled=""
                                            placeholder="Your User ID" value={{ $id }}>
                                        <input type="hidden" name="userid" value="{{ $id }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Home Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>BirthDay</label>
                                        <input type="date" class="form-control" name="birthday" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-control">

                                            <input id="avatar" type="file" accept="image/*" name="avatar"
                                                class="form-control">
                                            <label class="custom-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex; justify-content: flex-end;">
                                <button style="font-size: 18px" class="btn btn-primary btn-fill"
                                    type="submit">Create</button>
                            </div>

                        </form>
                    </div>



                </div>


            </div>
        </div>
    </div>
        <script>
            function buttonfileClick() {
                document.getElementsByTagName("input")[0].click();
            }

        </script>
    
    @endsection
