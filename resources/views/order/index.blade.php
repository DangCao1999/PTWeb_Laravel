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
                url: 'product/' + id,
                type: 'DELETE',
                data: {
                    _token: token,
                },
                success: function() {
                    //window.open('http://localhost:8000/product', '_blank');
                    //console.log("done");
                    let element = document.getElementById("element-" + id);
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
                        <h4 class="card-title">Order Table</h4>
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

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
