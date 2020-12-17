@extends('layouts.app')
@section('js')
    <script>
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
        //             //console.log("done");
        //             let element = document.getElementById("element-" + id);
        //             element.remove();
        //         }
        //     });
        // });
        //$('.datepicker').datepicker();
        //         $(document).ready(function(){
        //     $('#datepicker').timepicker({ timeFormat: 'h:mm:ss p' });
        // });

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
    @include('order.navorder')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Table</h4>
                        <button class="btn btn-primary btn-fill" data-toggle="modal"
                            data-target="#exampleModalLong">Filter</button>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('order.filter') }}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <div class="col-md-4">
                                            <div class="form-group">                                            
                                                <label class ="form-check-label" for="sel1">Filter with status</label>                                               
                                                <select class="form-control" name="statusList">
                                                    <option value="received">Received</option>
                                                    <option value="shipping">Shipping</option>
                                                    <option value="pending">Pending</option>
                                                  </select>       
                                            </div>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sel1">Select date start:</label>
                                                <input type="date" class="datepicker form-control" name="dateStart"
                                                    data-provide="datepicker">
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Select date end:</label>
                                                <input type="date" class="datepicker form-control" name="dateEnd"
                                                    data-provide="datepicker">
                                            </div>
                                        </div>                                 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                        Pre-money
                                    </th>
                                    <th>Status</th>
                                    <th>Create At</th>
                                    <th>
                                        Update At
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr id="element-{{ $order->id }}">
                                            {{-- <td>
                                                {{ $product->pictureURL }}
                                            </td> --}}
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
                                                <form action="/order/{{ $order->id }}" onsubmit="if(!confirm('Are You Sure?')){return false;}" method="post">
                                                    @method("PUT")
                                                    @csrf
                                                    <button type="submit" data-id="{{ $order->id }}" id="updateBtn"
                                                        class="btn btn-success btn-fill">Update Status</button>
                                                </form>
                                            </td>
                                            <td>
                                                 
                                                <a href="/order/{{ $order->id }}" class="btn btn-info btn-fill">
                                                    View</a>
                                            </td>
                                            <td>
                                                <form action="/order/{{ $order->id }}" onsubmit="if(!confirm('Are You Sure?')){return false;}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" data-id="{{ $order->id }}" id="deleteBtn"
                                                        class="btn btn-danger btn-fill">Detele</button>
                                                </form>
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
