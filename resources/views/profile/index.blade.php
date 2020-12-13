@extends('layouts.app')
@section('js')
    <script>
        $("#avatar").on('change', function() {
            var filename = $(this).val();
            $(this).next('.custom-file-label').html(filename);
        })

        $("#deleteBtn").on('click', function(e) {
            console.log("ok");
            if (!confirm("Do you really want to do this?")) {
                return false;
            }
            e.preventDefault();
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: id,
                type: 'DELETE',
                data: {
                    _token: token,

                },
                success: function() {
                    window.open('http://localhost:8000/user', '_blank');
                }
            });
        });

    </script>
@endsection('js')
@section('content')
    @include('user.navuser')
    <div class="content">
        <div class="row">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <h5 class="title">Show Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['profile' => $profile->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>User ID (disabled)</label>
                                        <input type="text" class="form-control" name="userId" disabled
                                            placeholder="Your User ID" value="{{ $profile->user_id }}">
                                        <input type="hidden" name="userid" value="{{ $profile->user_id }}">
                                    </div>
                                </div>
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Profile ID (disabled)</label>
                                        <input type="text" class="form-control" name="profileId" disabled
                                            placeholder="Your User ID" value="{{ $profile->id }}">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone" placeholder=""
                                            value="{{ $profile->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-5 px-1">
                                    <div class="form-group">
                                        <label>BirthDay</label>
                                        <input type="date" class="form-control" name="birthday" placeholder=""
                                            value="{{ $profile->birthday }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Home Address"
                                            value="{{ $profile->address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="form-control">

                                            <input id="avatar" type="file" accept="image/*" class="form-control">
                                            <input hidden name="avatar" value="{{ $profile->avatar }}">
                                            <label class="custom-file-label">{{ $profile->avatar }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex; justify-content: flex-end; padding-right: 9vw">
                                <button class="btn btn-info btn-fill" type="submit">Edit Profile</button>
                            </div>

                        </form>
                        <div style="display:flex; justify-content: flex-end; padding-right: 9vw">
                            <button data-id="{{ $profile->id }}" class="btn btn-danger btn-fill" id="deleteBtn">Delete
                                Profile</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div style="padding: 5%" class="card">
                    <img src="http://localhost:8000{{ $profile->avatar }}" alt="" srcset="">
                </div>
            </div>


        </div>
    </div>


@endsection
